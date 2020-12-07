import {
    SET_AUTH,
    SET_ALL_COURSES,
    SOMETHING_WRONG,
} from "../actions/constants";


const isEmpty = require("is-empty");

const initialState = {
    isAuthenticated: false,
    user: {},
    allCourses: [],
    authResponseIdentifer: 0,
    historyResponseIdentifer: 0,
    setAllCoursesResponseIdentifer: 0,
    s_id: null,
    courses: [],
    errorMessage: null,
    logoutResponseIdentifer: 0,
    serverError: null,
    setUserCoursesResponseIdentifer: 0,
    courseFlag: false

};
export default function(state = initialState, action) {
    switch (action.type) {

        case SET_ALL_COURSES:
            return {
                ...state,
                s_id : action.payload.s_id,
                allCourses: action.payload,
                setAllCoursesResponseIdentifer: (state.setAllCoursesResponseIdentifer) + 1
            };
        case SET_AUTH:
           
            return {
                ...state,
                isAuthenticated: !isEmpty(action.payload),
                s_id: action.payload.s_id,
                authResponseIdentifer: (state.authResponseIdentifer + 1)
            };
        case SOMETHING_WRONG:
           
            return {
                ...state,
                courseFlag: action.payload.Course,
                errorMessage: action.payload.message,
                serverError: action.payload
            };

        default:
            return state;
    }
}
