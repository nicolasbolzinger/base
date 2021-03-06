'use strict';

const {src, dest, series, watch} = require( 'gulp' ),
      gulpSass = require( 'gulp-sass' ),
      cleanCSS = require( 'gulp-clean-css' )


// Fonction qui compile le SCSS en CSS
function sass() {
  // Chemin fichier source
  return src( 'scss/**/*.scss' )
      // Mouline le scss en css
      .pipe( gulpSass() )
      // Envoie le css moulinĂ© dans le dossier destination
      .pipe( dest('css/') )

}

function minifyCss() {
return src( 'css/**/*.css' )
 .pipe( cleanCSS() )
 .pipe( dest( 'css/') )

}



exports.default = function() {

    watch( 'scss/*.scss', series( sass, minifyCss ) );

};
