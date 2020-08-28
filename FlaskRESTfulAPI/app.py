from flask import Flask, request, jsonify, make_response
from flask_sqlalchemy import SQLAlchemy
from marshmallow_sqlalchemy import ModelSchema
from marshmallow import fields

app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI']='mysql+pymysql://root:@localhost:3306/flask'
db = SQLAlchemy(app)



@app.route('/')
def hello_world():
    return 'FlaskRESTfulAPI'


###Models####
class CV(db.Model):
    __tablename__ = "cvs"
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(20))
    degree = db.Column(db.String(100))
    university = db.Column(db.String(20))
    user_id = db.Column(db.Integer)
    def create(self):
      db.session.add(self)
      db.session.commit()
      return self
    def __init__(self,name,degree,university,user_id):
        self.name = name
        self.degree = degree
        self.university = university
        self.user_id = user_id
    def __repr__(self):
        return '' % self.id
db.create_all()

class CVSchema(ModelSchema):
    class Meta(ModelSchema.Meta):
        model = CV
        sqla_session = db.session
    id = fields.Number(dump_only=True)
    name = fields.String(required=True)
    degree = fields.String(required=True)
    university = fields.String(required=True)
    user_id = fields.Number(required=True)

@app.route('/cv', methods = ['GET'])
def index():
    get_cv = CV.query.all()
    cv_schema = CVSchema(many=True)
    cv = cv_schema.dump(get_cv)
    return make_response(jsonify({"cv": cv}))


@app.route('/cv/<id>', methods = ['GET'])
def get_cv_by_id(id):
    get_cv = CV.query.get(id)
    cv_schema = CVSchema()
    cv = cv_schema.dump(get_cv)
    return make_response(jsonify({"cv": cv}))


@app.route('/cv/<id>', methods = ['PUT'])
def update_cv_by_id(id):
    data = request.get_json()
    get_cv = CV.query.get(id)
    if data.get('name'):
        get_cv.name = data['name']
    if data.get('degree'):
        get_cv.degree = data['degree']
    if data.get('university'):
        get_cv.university = data['university']
    if data.get('user_id'):
        get_cv.user_id = data['user_id']
    db.session.add(get_cv)
    db.session.commit()
    cv_schema = CVSchema(only=['id', 'name', 'degree','university','user_id'])
    cv = cv_schema.dump(get_cv)
    return make_response(jsonify({"cv": cv}))


@app.route('/cv/<id>', methods = ['DELETE'])
def delete_cv_by_id(id):
    get_cv = CV.query.get(id)
    db.session.delete(get_cv)
    db.session.commit()
    return make_response("",204)


@app.route('/cv', methods = ['POST'])
def create_cv():
    data = request.get_json()
    cv_schema = CVSchema()
    cv = cv_schema.load(data)
    result = cv_schema.dump(cv.create())
    return make_response(jsonify({"cv": result}),200)

if __name__ == '__main__':
    app.run(debug=True)
