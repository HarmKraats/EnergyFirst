const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin"); 
const CopyPlugin = require("copy-webpack-plugin"); 

module.exports = (env) => {
  return {
    mode: env.WEBPACK_WATCH ? 'development' : 'production',
    entry: {
      main: './scripts/index.js',
    },
    module: {
      rules: [
        {
          test: /\.css$/i,
          use: ['style-loader', 'css-loader'],
        },
        {
          test: /\.s[ac]ss$/i,
          use: [
            {
              loader: 'file-loader',
              options: { outputPath: 'css/', name: '[name].min.css'},
            },
            "sass-loader",
          ],
        },
      ],
    },
    output: {
      filename: 'main.js',
      path: path.resolve(__dirname, '../dist'),
      clean: true,
    },
    devServer: {
      static: {
        directory: path.join(__dirname, '../'),
      },
      compress: true,
    },
    plugins: [
      new MiniCssExtractPlugin({
        // Options similar to the same options in webpackOptions.output
        // both options are optional
        filename: "[name].css",
        chunkFilename: "[id].css",
      }),
      // new CopyPlugin({
      //   patterns: [
      //     {from : 'images', to: '../dist'}
      //   ],
      // }),
    ],
  }
};
