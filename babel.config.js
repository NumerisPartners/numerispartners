module.exports = {
  presets: [
    [
      '@babel/preset-env',
      {
        targets: {
          node: 'current',
          browsers: '> 0.5%, last 2 versions, Firefox ESR, not dead'
        }
      }
    ]
  ]
};
