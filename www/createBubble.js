function createBubble()
		{

			var canvas = document.getElementById('myCanvas');
			var canvas2 = document.getElementById('myCanvas2');

			var context = canvas.getContext('2d');
			var centerX = canvas.width / 2;
			var centerY = canvas.height / 2;

			var context2 = canvas2.getContext('2d');
			var centerX2 = canvas2.width / 2;
			var centerY2 = canvas2.height / 2;

			var radius = 120;

			context.beginPath();
			context.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
			context.fillStyle = 'green';
			context.fill();
			context.lineWidth = 5;
			context.strokeStyle = '#003300';
			context.stroke();
			context.fillStyle = 'white';
			context.font = "40px Arial";
			context.textBaseline="bottom";
			var padd=centerY-85;
			context.textAlign= "left";
			context.fillText(" \"", 0, padd+40);
			context.font = "20px Arial";
			context.textAlign= "center";
			context.fillText("Great work", centerX, padd+40);
			context.fillText("is done by", centerX, padd+60);
			context.fillText("people who", centerX, padd+80);
			context.fillText("are not ", centerX, padd+100);
			context.fillText("afraid to", centerX, padd+120);
			context.fillText("be great", centerX, padd+140);
			context.font = "40px Arial";
			context.textAlign= "right";
			context.fillText("\" ", 2*centerX, padd+180);

			context2.beginPath();
			context2.arc(centerX2, centerY2, radius, 0, 2 * Math.PI, false);
			context2.fillStyle = 'green';
			context2.fill();
			context2.lineWidth = 5;
			context2.strokeStyle = '#003300';
			context2.stroke();
			context2.fillStyle = 'white';
			context2.font = "40px Arial";
			context2.textBaseline="bottom";
			context2.textAlign= "left";
			context2.fillText(" \"", 0, padd+40);
			context2.font = "20px Arial";
			context2.textAlign= "center";
			context2.fillText("A great work", centerX, padd+40);
			context2.fillText("is made out", centerX, padd+60);
			context2.fillText("of a", centerX, padd+80);
			context2.fillText("combination", centerX, padd+100);
			context2.fillText("of obedience", centerX, padd+120);
			context2.fillText("and liberty", centerX, padd+140);
			context2.font = "40px Arial";
			context2.textAlign= "right";
			context2.fillText("\" ", 2*centerX, padd+180);
			context2.font = "15px Arial";
			context2.fillText("-Nadia Boulanger", 2*centerX, padd+170);
			

		}