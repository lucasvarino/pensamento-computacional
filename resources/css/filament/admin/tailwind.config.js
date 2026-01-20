import preset from '../../../../vendor/filament/filament/tailwind.config.preset'
import rootConfig from '../../../../tailwind.config.js' // importa o config da raiz

export default {
  presets: [preset],
  content: [
    './app/Filament/**/*.php',
    './resources/views/filament/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
    './resources/views/**/*.blade.php', // garante que suas blades normais sejam escaneadas
    './resources/views/components/**/*.blade.php',
  ],
  theme: {
    extend: {
      // garante que as cores que você definiu no root sejam visíveis aqui
      colors: {
        ...((rootConfig && rootConfig.theme && rootConfig.theme.extend && rootConfig.theme.extend.colors) || {}),
      },
    },
  },
}
