module.exports = {
    tabWidth: 2,
    singleQuote: true,
    semi: false,
    arrowParens: "always",
    overrides: [
        {
            files: "*.blade.php",
            options: {
                parser: "html",
                embeddedLanguageFormatting: "off",
            },
        },
    ],
};
