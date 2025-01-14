/** @type {import('tailwindcss').Config} */
const defaultTheme = require("tailwindcss/defaultTheme");
module.exports = {
	content: ["./**/*.{html,php}", "./main.js"],
	theme: {
		extend: {},
	},
	plugins: [],
};
