// tailwind.config.js
module.exports = {
theme: {
    extend: {
    boxShadow: {
        'up-sm': '0 -1px 2px 0 rgba(0, 0, 0, 0.05)',
        'up-md': '0 -4px 6px -1px rgba(0, 0, 0, 0.1), 0 -2px 4px -1px rgba(0, 0, 0, 0.06)',
        'up-lg': '0 -10px 15px -3px rgba(0, 0, 0, 0.1), 0 -4px 6px -2px rgba(0, 0, 0, 0.05)',
        // Add more custom upwards shadows as needed
    }
    }
},
plugins: [],
}