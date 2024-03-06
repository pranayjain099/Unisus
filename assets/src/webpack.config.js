
// Importing the path module
const path = require('path');

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
    // file name inside js directory , if entry is single.js then output file will be single.js same for main.js.
    filename: 'js/[name].js'
};



module.exports = (env, argv) => ({

    // If you donot create webpack.config.js then by defualt index.js will be our entry file and main.js will be bydefault our output file
    // Entry file 
    entry: entry,

    // File where we need output 
    output: output,

});