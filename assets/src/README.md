# Babel And Webpack Configuration

## Create package.json file and install webpack

```
cd projectname
npm init --yes // creates package.json
```

Then update your package.json with following details

```
{
	"name": "jk",
	"version": "1.0.0",
	"description": "Jk Theme Packages",
	"main": "main.js",
	"scripts": {
		"test": "echo \"Error: no test specified\" && exit 1"
	},
	"keywords": [ "wordpress", "themes" ],
	"author": "Kishan Jasani",
	"license": "MIT",
	"private": true,
	"browserslist": [
		"defaults"
	]
}
```

Now lets install webpack, webpack cli , babel and some other loaders and plugins as dev dependencies

```
npm i webpack webpack-cli @babel/core @babel/preset-env @babel/preset-react babel-loader clean-webpack-plugin css-loader file-loader mini-css-extract-plugin optimize-css-assets-webpack-plugin cssnano style-loader uglifyjs-webpack-plugin cross-env -D
```

Create a following directory so that you have the following structure `your-theme/assets/src/js`.
Then create files `main.js` and `single.js` inside of `src/js` directory. Also add an `img` directory( inside `src` ) and add an image `cat.jpg` inside of that

Now add the below script to your `package.json`

```
 "scripts": {
	"prod": "cross-env NODE_ENV=production webpack --mode production --progress",
	"dev": "cross-env NODE_ENV=development webpack --watch --mode development --progress",
	"clean": "rm -rf build/*"
  },
```

### The Webpack Config file
You can create a config file called `webpack.config.js` that stores the configuration for your webpack like the path for your entry point and output file, loaders etc. If you don’t create this file then webpack uses its default configuration file.
So let’s create a file called `webpack.config.js` in the root of your project and add the following configurations.

```
/**
 * Webpack configuration.
 */

const path = require( 'path' );
const MiniCssExtractPlugin = require( 'mini-css-extract-plugin' );
const OptimizeCssAssetsPlugin = require( 'optimize-css-assets-webpack-plugin' );
const cssnano = require( 'cssnano' ); // https://cssnano.co/
const { CleanWebpackPlugin } = require( 'clean-webpack-plugin' );
const UglifyJsPlugin = require( 'uglifyjs-webpack-plugin' );

// JS Directory path.
const JS_DIR = path.resolve( __dirname, 'src/js' );
const IMG_DIR = path.resolve( __dirname, 'src/img' );
const BUILD_DIR = path.resolve( __dirname, 'build' );

const entry = {
	main: JS_DIR + '/main.js',
	single: JS_DIR + '/single.js',
};

const output = {
	path: BUILD_DIR,
	filename: 'js/[name].js'
};

/**
 * Note: argv.mode will return 'development' or 'production'.
 */
const plugins = ( argv ) => [
	new CleanWebpackPlugin( {
		cleanStaleWebpackAssets: ( argv.mode === 'production' ) // Automatically remove all unused webpack assets on rebuild, when set to true in production. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
	} ),

	new MiniCssExtractPlugin( {
		filename: 'css/[name].css'
	} ),
];

const rules = [
	{
		test: /\.js$/,
		include: [ JS_DIR ],
		exclude: /node_modules/,
		use: 'babel-loader'
	},
	{
		test: /\.scss$/,
		exclude: /node_modules/,
		use: [
			MiniCssExtractPlugin.loader,
			'css-loader',
		]
	},
	{
		test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
		use: {
			loader: 'file-loader',
			options: {
				name: '[path][name].[ext]',
				publicPath: 'production' === process.env.NODE_ENV ? '../' : '../../'
			}
		}
	},
];

/**
 * Since you may have to disambiguate in your webpack.config.js between development and production builds,
 * you can export a function from your webpack configuration instead of exporting an object
 *
 * @param {string} env environment ( See the environment options CLI documentation for syntax examples. https://webpack.js.org/api/cli/#environment-options )
 * @param argv options map ( This describes the options passed to webpack, with keys such as output-filename and optimize-minimize )
 * @return {{output: *, devtool: string, entry: *, optimization: {minimizer: [*, *]}, plugins: *, module: {rules: *}, externals: {jquery: string}}}
 *
 * @see https://webpack.js.org/configuration/configuration-types/#exporting-a-function
 */
module.exports = ( env, argv ) => ({

	entry: entry,

	output: output,

	/**
	 * A full SourceMap is emitted as a separate file ( e.g.  main.js.map )
	 * It adds a reference comment to the bundle so development tools know where to find it.
	 * set this to false if you don't need it
	 */
	devtool: 'source-map',

	module: {
		rules: rules,
	},

	optimization: {
		minimizer: [
			new OptimizeCssAssetsPlugin( {
				cssProcessor: cssnano
			} ),

			new UglifyJsPlugin( {
				cache: false,
				parallel: true,
				sourceMap: false
			} )
		]
	},

	plugins: plugins( argv ),

	externals: {
		jquery: 'jQuery'
	}
});
```

### Babel Configurations

Create a file called `.babelrc` inside assets directory and add the below configurations.

```
{
  "presets": [
	[
	  "@babel/preset-env",
	  {
		"targets": {
		  "browsers": [
			"last 2 Chrome versions",
			"last 2 Firefox versions",
			"last 2 Safari versions",
			"last 2 iOS versions",
			"last 1 Android version",
			"last 1 ChromeAndroid version",
			"ie 11"
		  ]
		}
	  }
	],
	"@babel/preset-react"
  ]
}
```

Lets create a directory called `clock` inside of src directory and add a file called `index.js` and just write some JavaScript lets say

`console.log(‘hello’);`

Then inside of `main.js` import the `clock/index.js` and the image like so :

```
import './clock';

// Images.
import '../img/cats.jpg';
```

### Running dev server
Now run `npm run dev` and it will run the webpack dev server in watch mode and bundle the files for you . Babel is going to convert the modern JS into JS that most browsers can understand. Notice the build folder.

```
npm run dev
```

### SCSS Configurations
Install packages:
```
npm i node-sass sass-loader sass-mq -D
```
