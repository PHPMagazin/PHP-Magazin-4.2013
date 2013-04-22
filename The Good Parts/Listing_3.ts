class Shape {
    constructor() {}
    
    draw(context: CanvasRenderingContext2D) {
        throw new Error("Abstract method.");
    }
}

interface Point {
    x: number;
    y: number;
}

class Circle extends Shape {
    constructor(public center: Point, public radius: number) {
        super();
    }

    draw(context: CanvasRenderingContext2D) {
      context.beginPath();
      context.arc(this.center.x, this.center.y, this.radius, 0, 2 * Math.PI, false);
      context.fillStyle = 'red';
      context.fill();
    }
}

function main() {
    var canvas = <HTMLCanvasElement>document.createElement("canvas");
    canvas.width = 512;
    canvas.height = 512;
    document.body.appendChild(canvas);
    var context = canvas.getContext("2d");
    
    var circle = new Circle({x: 100, y: 100}, 25);
    circle.draw(context);
}

main();
