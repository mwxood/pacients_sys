const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  context: path.resolve(__dirname, 'src'),
  entry: {
      frontend: './js/index.js',
  },

  output: {
    path: path.resolve(__dirname, 'assets'),
    filename: 'js/[name].bundle.js',
  },

  module: {
    rules: [
        {
            test: /\.js$/,
            exclude: /(node_modules)/,
            use: {
              loader: 'babel-loader',
              options: {
                presets: ['@babel/preset-env']
              }
            }
          },
          {

            test: /\.(sa|sc|c)ss$/,
      
            use: [
                {
                    loader: MiniCssExtractPlugin.loader
                  }, 
                   {
                     loader: "css-loader",
                   },
                   {

                     loader: "postcss-loader"
                   },
                   {

                     loader: "sass-loader",
                     options: {
                       implementation: require("sass")
                     }
                   }
                 ]
          },
          {
            // Apply rule for fonts files
            test: /\.(woff|woff2|ttf|otf|eot)$/,
            use: [
                   {
                     // Using file-loader too
                     loader: "file-loader",
                     options: {
                       publicPath: '../fonts',
                       outputPath: 'fonts'
                     }
                   }
                 ]
          },

          {
            // Now we apply rule for img
            test: /\.(png|jpe?g|gif|svg)$/,
            use: [
                   {
                     loader: "file-loader",
                     options: {
                        outputPath: 'img',
                       //   path: path.resolve(__dirname, './img'),
                         publicPath: '../img',
                         // path: path.resolve(__dirname, 'img'),
                     }
                   }
                 ]
          },
         
    ],
},

plugins: [
    new MiniCssExtractPlugin({
        options: {
            outputPath: 'css'
        },
      filename: "css/[name].bundle.css"
    })
  ],

  mode: 'development'
};
