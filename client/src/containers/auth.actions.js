import axios from "axios";
import { GET_ERRORS, SET_AUTH, SET_ALL_COURSES, SOMETHING_WRONG } from "../actions/constants.js";
import { formatDate } from "../utility";

export const getAllCourses = () => (dispatch) => {
					
						const apiEndPoint = "http://localhost:8000/getCourses";
						axios.get(apiEndPoint).then((res) => {
							
							let c = [];
							let data = res.data.data.data;
							data.map(x => c.push({
								course_id: x.course_id,
								name: x.name
							}));
							const key = 'course_id';
							const arrayUniqueByKey = [...new Map(c.map(item => [item[key], item])).values()];
							let ans = [];
							for(let i = 0; i < arrayUniqueByKey.length; i++) {
								let y = arrayUniqueByKey[i];
								let tmp = [];
								data.map(x => {
									if(x.course_id == y.course_id) tmp.push({
										batch_id: x.batch_id,
										date: formatDate(x.date)
									});
								})
								ans.push({
									course_id: y.course_id,
									name: y.name,
									batch: tmp
								});
							}
							dispatch(setCourses(ans));
						}).catch((err) => {
						
							dispatch({
								type: GET_ERRORS,
								payload: err.response,
							})
						});
};

export const authUserLogin = (userData) => dispatch => {
				
				const apiEndPoint = "http://localhost:8000/login";
				axios.post(apiEndPoint, (userData)).then(res => {
					
					if(res.data.data.data.flag) {
                        if(res.data.s_id != null){
							localStorage.setItem("s_id", res.data.s_id);
						}
						dispatch(setAuth(res.data.data.data));
					} else {
						dispatch(authWrong(res.data.data.data));
					}
				}).catch(err => { 
					dispatch({
						type: GET_ERRORS,
						payload: null
					})
				});
};
export const authUserRegister = (userData) => dispatch => {
					
					//	debugger;
					const apiEndPoint = "http://localhost:8000/register";
					axios.post(apiEndPoint, userData).then(res => {
						
						if(res.data.data.data.flag) {
			                if(res.data.s_id != null){
								localStorage.setItem("s_id", res.data.s_id);
							}
							dispatch(setAuth(res.data.data.data));
						} else {
							dispatch(authWrong(res.data.data.data));
						}
					}).catch(err => {
						dispatch({
	
							type: GET_ERRORS,
							payload: null
						})
					});
};
// Set logged in user
export const setAuth = data => {
	
		return {
			type: SET_AUTH,
			payload: data
		};
};
export const authWrong = data => {
		return {
			type: SOMETHING_WRONG,
			payload: data
		};
};
export const setCourses = (decoded) => {
		     
		return {
			type: SET_ALL_COURSES,
			payload: decoded,
		};
};
