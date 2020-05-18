let path = require('path');

module.exports = {
    entry: __dirname + "/src/index.js",
    output: {
        path: __dirname + "/public/",
        filename: "app.js"
    },
    devServer: {
        contentBase: path.join(__dirname, '/public'),
        compress: true,
        port: 9000
    },
    watch: true,
    watchOptions: {
        ignored: '/node_modules/'
    }
};
