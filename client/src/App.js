import React, { Component } from "react";
import { BrowserRouter as Router, Route} from "react-router-dom";

import { Provider } from "react-redux";
import store from "./store";

import "./include/css/bootstrap.css";
import "./include/css/bootstrap.min.css";
import login from "./containers/login";
import register from "./containers/register";


class App extends Component {
  render() {
    return (
			<Provider store={store}>
			<Router>
					<div className="App">
							<Route exact={ false} path="/login" component={login} />
							<Route exact={ false} path="/register" component={register} />
					</div>
			</Router>
   	</Provider>
    );
  }
}
export default App;

