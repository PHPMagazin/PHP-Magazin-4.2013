(function() {
  var Circle, Shape,
    __hasProp = Object.prototype.hasOwnProperty,
    __extends = function(child, parent) { for (var key in parent) { if (__hasProp.call(parent, key)) child[key] = parent[key]; } function ctor() { this.constructor = child; } ctor.prototype = parent.prototype; child.prototype = new ctor; child.__super__ = parent.prototype; return child; };

  Shape = (function() {

    function Shape() {}

    Shape.prototype.draw = function() {
      throw new Error("Abstract method.");
    };

    return Shape;

  })();

  Circle = (function(_super) {

    __extends(Circle, _super);

    function Circle() {
      Circle.__super__.constructor.apply(this, arguments);
    }

    Circle.prototype.draw = function() {};

    return Circle;

  })(Shape);

}).call(this);
