module.exports = {
	"proxy": "https://learnexcel.middcreate.net/",
	"notify": false,
	"serveStatic": ['./css/'],
	"files": ["./css/*.css", "./js/*.js", "./**/*.php"],
	"rewriteRules": [
		{
			match: new RegExp('wp-content/themes/dist/css/theme.min.css?ver=0.10.0.1658523357'),
			fn: () => {
				return 'css/theme.min.css'
			}
		}
	]
};