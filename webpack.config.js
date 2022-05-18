const path = require("path");

module.exports = {
    entry: "./liveStreaming.js",
    output: {
        filename: "bundle.js",
        path: path.resolve(__dirname, "./public/dist/live"),
    },
    devServer: {
        compress: true,
        port: 8080,
    },
};
