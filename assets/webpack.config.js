
// Importing the path module
const path = require('path');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const OptimizeCssAssetsPlugin = require('css-minimizer-webpack-plugin');
const cssnano = require('cssnano');
const TerserJSPlugin = require('terser-webpack-plugin');
const DependancyExtractionWebpackPlugin = require('@wordpress/dependency-extraction-webpack-plugin');


const JS_DIR = path.resolve(__dirname, 'src/js');
const IMG_DIR = path.resolve(__dirname, 'src/img');
const BUILD_DIR = path.resolve(__dirname, 'build');

// We want two entry files 
const entry = {
    main: JS_DIR + '/main.js',
    single: JS_DIR + '/single.js',
    editor: JS_DIR + '/editor.js',
    blocks: JS_DIR + '/blocks.js',
};

// output file
const output = {
    path: BUILD_DIR,
    // file name inside js directory , if entry is single.js then output file will be single.js same for main.js
    filename: 'js/[name].js'
};

const rules = [
    {
        // Rules for javascript file

        // file with extention .js will be bundled in JS_DIR directory but we will exclude all the files of node_modules directory.
        test: /\.js$/,
        include: [JS_DIR],
        exclude: /node_modules/,

        // This will convert the js in older version if any browser is not compactible with the latest version of javasript.
        use: 'babel-loader'
    },

    {
        // Rules for css file

        // Saas files
        test: /\.scss$/,
        exclude: /node_modules/,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
    },

    {       // Rules for images and files
        test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
        use: [
            {
                loader: 'file-loader',
                options: {
                    name: '[path][name].[ext]',
                    // If the environment is production then go just one step outside and if its development then go 2 steps outside.
                    publicPath: 'production' === process.env.NODE_ENV ? '../' : '../..',
                },
            },
        ],
    }
];


const plugins = (argv) => [    //plugin for cleaning unused assets and output files on rebuild

    new CleanWebpackPlugin({
        cleanStaleWebpackAssets: ('production' === argv.mode)
    }),

    //plugin for extracting css after bundling of files
    new MiniCssExtractPlugin({
        filename: 'css/[name].css'
    }),

    new DependancyExtractionWebpackPlugin({
        injectPolyfill: true, // for translation into the older version of browsers
        combineAssets: true, // Used to combine assets, typically JavaScript and CSS files, into a single file during the build process.
    })
];

module.exports = (env, argv) => ({

    // Entry file 
    entry: entry,

    // File where we need output 
    output: output,

    devtool: 'source-map',

    // Setting the module rules
    module: {
        rules: rules,
    },

    // plugins for optimization
    optimization: {
        minimizer: [

            // A Webpack plugin to optimise \ minimise CSS assets
            new OptimizeCssAssetsPlugin({
                minimizerOptions: {

                    //This is actually responsible to minify your CSS
                    minimizerImplementation: cssnano,
                }
            }),
            new TerserJSPlugin({
                // Cache: false,
                parallel: true,
                terserOptions: {

                    // Specify your Terser options here
                    sourceMap: false, // Example: sourceMap option
                },
            }),
        ]
    },

    // setup webpack plugins 
    plugins: plugins(argv),

    // Externals
    externals: {
        jquery: 'jquery'
    },

});