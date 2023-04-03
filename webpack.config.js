const path = require('path');

// css extraction and minification
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");

// clean out build dir in-between builds
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = [
    {
        mode: 'production',
        entry: {
            'main': [
                './index.js',
                './sass/style.scss',
            ]
        },
        output: {
            //filename: './dist/[name].min.[fullhash].js',
            filename: './dist/[name].min.js',
            path: path.resolve(__dirname)
        },
        module: {
            rules: [
                // js babelization
                {
                    test: /\.(js|jsx)$/,
                    exclude: /node_modules/,
                    loader: 'babel-loader',
                    //use: ['style-loader', 'css-loader', 'sass-loader']
                },
                // sass compilation
                {
                    test: /\.(sass|scss)$/,
                    use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader']
                },
                // loader for webfonts (only required if loading custom fonts)
                {
                    test: /\.(woff|woff2|eot|ttf|otf)$/,
                    type: 'asset/resource',
                    generator: {
                        filename: './css/build/font/[name][ext]',
                    }
                },
            ]
        },
        plugins: [
            // clear out build directories on each build
            new CleanWebpackPlugin({
                cleanOnceBeforeBuildPatterns: [
                    './dist/*',
                ]
            }),
            // css extraction into dedicated file
            new MiniCssExtractPlugin({
                //filename: './dist/main.min.[fullhash].css'
                filename: './dist/main.min.css'
            }),
        ],
        optimization: {
            // minification - only performed when mode = production
            minimizer: [
                // js minification - special syntax enabling webpack 5 default terser-webpack-plugin
                `...`,
                // css minification
                new CssMinimizerPlugin(),
            ]
        },
    }
];

