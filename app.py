# pip install flask
# export FLASK_APP=app
# flask run
 
# Côté JS (jQuery):
# $.get("http://localhost:5000/", function(data) {
#   console.log(data);
# })

import datetime
from flask import Flask

app = Flask(__name__)

@app.route("/")
def hello_world():
    return datetime.datetime.now().strftime("%H:%M:%S")

@app.after_request
def add_header(response):
    response.headers['Access-Control-Allow-Origin'] = '*' 
    return response
