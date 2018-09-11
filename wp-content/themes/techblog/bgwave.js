/*
 * 参考：https://sterfield.co.jp/designer/canvasで波のアニメーションを描画する/
 * 上記を一部変更した
 */

(function () {
  var unit = 100,
      canvas, context,
      height, width, xAxis, yAxis,
      draw;

  function init() {
      canvas = document.getElementById("canvas");
      canvas.width = document.documentElement.clientWidth; //Canvasのwidthをウィンドウの幅に合わせる
      canvas.height = document.documentElement.clientHeight;
      context = canvas.getContext("2d");
      height = canvas.height;
      width = canvas.width;
      yAxis = Math.floor(height-400);
      xAxis = 0;
      draw();
  }

  function draw() {
      // キャンバスの描画をクリア
      context.clearRect(0, 0, width, height);
      //波を描画
      drawWave('#DDDDDD', '#cce7ff', 0.25, 10, 0.1);

      draw.seconds = draw.seconds + .005;
      draw.t = draw.seconds*Math.PI;
      setTimeout(draw, 35);
  };
  draw.seconds = 0;
  draw.t = 0;

  function drawWave(fillcolor, watercolor, alpha, zoom, delay) {
      var ey, yy;
      context.fillStyle = fillcolor;
      context.globalAlpha = alpha;
      context.beginPath(); //パスの開始
      ey = drawSine(draw.t / 0.5, zoom, delay);
      yy = (ey + 10 * (Math.sin(draw.t) + 2 * Math.sin(draw.t + 0.7))/3);
      context.lineTo(width + 10, yy);
      context.closePath() //パスを閉じる
      context.fill(); //塗りつぶす
      context.lineTo(0, height);
      context.lineTo(width + 10, height);
      context.lineTo(width + 10, yy);
      context.fillStyle = watercolor;
      context.globalAlpha = '0.1';
      context.fill(); //塗りつぶす
      context.strokeStyle = '#000000';
      context.lineWidth = 1;
      drawSine(draw.t / 0.5, zoom, delay);
      context.stroke();
  }

  function drawSine(t, zoom, delay) {
      var x = t;
      var y = Math.sin(x)/zoom;
      context.moveTo(xAxis, unit*y+yAxis);
      for (i = xAxis; i <= width + 10; i += 10) {
          x = t+(-xAxis+i)/unit/zoom;
          y = Math.sin(x - delay)/6;
          context.lineTo(i, unit*y+yAxis);
      }
      return unit*y+yAxis;
  }

  init();
  })();
