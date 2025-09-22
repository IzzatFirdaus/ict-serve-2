module.exports = {
    extends: ['stylelint-config-standard', 'stylelint-config-tailwindcss'],
    plugins: [],
    rules: {
        'block-no-empty': true,
        'no-descending-specificity': null,
        // 'order/properties-order': ... (removed, plugin not compatible with stylelint@16)
        // 'plugin/declaration-block-no-ignored-properties': true, (removed, plugin not compatible with stylelint@16)
        'at-rule-no-unknown': [
            true,
            {
                ignoreAtRules: [
                    'tailwind',
                    'apply',
                    'variants',
                    'responsive',
                    'screen',
                    'layer',
                    'theme',
                    'import',
                ],
            },
        ],
        'property-no-vendor-prefix': true,
        'value-no-vendor-prefix': true,
    },
};
