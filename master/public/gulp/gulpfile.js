var gulp = require('gulp'); //gulpプラグインの読み込み
var sass = require('gulp-sass'); //SASSコンパイルプラグイン
var pleeease = require('gulp-pleeease'); //ベンダープレフィックス

// gulp.task('default', function() { //タスクの登録
//     console.log("Hello! world!");
// });

gulp.task('sass', function() { //'sass'という名前でタスクを定義
    return gulp.src('./src/sass/*.scss') //sassがあるパス
        .pipe(sass().on('error', sass.logError)) //sassコンパイル実行
        .pipe(pleeease({
            sass: true,
            mqpacker: true, //メディアクエリをルール毎にパックするかどうか。 デフォルトはtrue
            minifier: false, //圧縮するかしないか デフォルトはtrue
            // out         : 'style.min.css',                            //リネーム
            autoprefixer: { 'browsers': ['last 3 versions', 'ie 10'] } //ブラウザのどのバージョンまでベンダープレフィックスを付与するか
        }))
        .pipe(gulp.dest('../css')); //書き出し先
});