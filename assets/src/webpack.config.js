
// Importing the path module
const path = require('path');

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CleanWebpackPlugin = require('clean-webpack-plugin');


const JS_DIR = path.resolve(__dirname, '/src/js');
const IMG_DIR = path.resolve(__dirname, '/src/img');
const BUILD_DIR = path.resolve(__dirname, 'build');

// We want two entry files 
const entry = {
    main: JS_DIR + '/main.js',
    single: JS_DIR + '/single.js',
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
        use: [MiniCssExtractPlugin.loader, 'css-loader'],
    }
];


module.exports = (env, argv) => ({

    // Entry file 
    entry: entry,

    // File where we need output 
    output: output,

    devtool: 'source-map',
    module: {
        rules: rules,
    },

});