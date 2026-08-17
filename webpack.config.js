const path = require('path');
// const TerserPlugin = require("terser-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');

module.exports = (env) => {
  if (env.NODE_ENV === 'production') {
    var CURRENT_ENV = 'build' 
  } else if (env.NODE_ENV === 'local') {
    var CURRENT_ENV = 'dev';
  }

  return {
    mode: "none",
    watch: CURRENT_ENV == 'dev' ? true : false,
    entry: ['./src/app.js'],
    output: {
        filename: './js/scripts.js',
        path: path.resolve(__dirname)
    },
    plugins: [].concat (
      [
        new MiniCssExtractPlugin({
          filename:  "./style.css",
        })
      ],
      CURRENT_ENV == 'dev' ? // start of if statement that will open browsersync server if CURRENT_ENV == 'dev' is true.
        [ new BrowserSyncPlugin({
          port: '8080',
          open: 'external',
          // If using the Local App by Flywheel or similar to produce local domain for your project change the details below to match (remove proxy if SSL is not required).
          host: 'mae.local',
          proxy: 'https://mae.local',
          files: [
            {
              match: ['./*.php'],
              fn: function (event, file) {
                  if (event === "change") {
                      const bs = require('browser-sync').get('bs-webpack-plugin');
                      bs.reload();
                  }
              }
          },
              {
                  match: ['./*.css', '.js/*.js'],
                  fn: function (event, file) {
                      if (event === "change") {
                          const bs = require('browser-sync').get('bs-webpack-plugin');
                          bs.stream();
                      }
                  }
              }],
          injectChanges: true,
          notify: false
        })] 
      : [], // end of if statement that will open browsersync server if CURRENT_ENV == 'dev' is true.
    ),
    module: {
    rules: [
      { // perform js babelization on all .js files
        test: /\.m?js$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-react']
          }
        }
      },
      { // add fonts to /fonts dir
        test: /\.(woff(2)?|ttf|eot|otf)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              outputPath: 'fonts',
              name: '[name].[ext]',
            },
          },
        ],
      },
      { // add imgs to /imgs dir
        test: /\.(svg|jpg|png)$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              outputPath: 'img/icons',
              name: '[name].[ext]',
            }
          },
        ],
      },
      { // all css changes
        test: /\.((c|sa|sc)ss)$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'postcss-loader',
          'sass-loader'
        ]
      },
    ],
  },
  optimization: {
    minimize: CURRENT_ENV == 'dev' ? false : true,
    minimizer: [
      `...`, // For webpack@5 you can use the `...` syntax to extend existing minimizers (i.e. `terser-webpack-plugin`), sam as typing: "new TerserPlugin(),"
      new CssMinimizerPlugin(),
    ],
  },
  }
};