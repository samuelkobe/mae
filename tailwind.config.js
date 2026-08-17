module.exports = {
  content:  [
    './**/*.php', 
    './**/*.css',
  ],
  media: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        brand: {
          accent: '#AF3E14',
          main: '#63CBD8',
          dark: '#62A266',
          neutral: '#FCCC10',
          black: '#020202',
        },
        grey: {
          light: '#F6f6f6',
          alt: '#D6D6D6',
          medium: '#B4B4B4',
          dark: '#020202',
        }
      },
      minWidth: {
        '32': '8rem',
        '40': '10rem',
        '64': '16rem',
        '1/2': '50%',
      },
      minHeight: {
        '96': '24rem',
        '128': '32rem',
        '160': '40rem',
        '192': '48rem',
        '35vh': '35vh',
      },
      transitionDuration: {
        '0': '0ms',
      },
      fontFamily: {
        sans: ["Lato", "sans-serif"],
        title: ["Lato", "sans-serif"],
        button: ["Nunito", "sans-serif"]
      },
      height: {
        '88': '22rem',
        '108': '27rem',
        '128': '32rem',
        'full-plus': 'calc(100% + 12rem)',
      },
      spacing: {
        '025': '1px',
        '05': '2px',
        '075': '3px',
        '1/24': '4.1667%',
        '1/12': '8.3333%',
        '1/6': '16.6667%',
        'video': '56.6667%',
      },
      transformOrigin: {
        'hamburger': '0.475rem',
      },
      transitionProperty: {
        'height': 'height',
      },
      width: {
        '88': '22rem',
        '192': '48rem',
      },
      zIndex: {
        '-1': '-1',
      },
    },
  },
  variants: {
    extend: {
      backgroundColor: ['even'],
      borderColor: ['even'],
      border: ['even'],
      width: ['even'],
      margin: ['even', 'last'],
      padding: ['even'],
      outline: ['focus'],
      boxShadow: ['focus'],
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
