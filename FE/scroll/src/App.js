import React, { useState, useEffect } from "react";
import Master from './master'
import Body from './component/body';
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import Welcome from './component/welcome';
import StoriesContent from './component/body/IntroduceComponent/stories';
import { ToastContainer, toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';


function App() {
    const [isLoading, setIsLoading] = useState(true);
    useEffect(() => {
        const timer = setTimeout(() => setIsLoading(false), 2500);
        return () => clearTimeout(timer);

    }, []);

    useEffect(() => {
        const timedelay = setTimeout(() => {
            toast("welcome!");
            }, 3000);
        return () => clearTimeout(timedelay);
    }, []);

    if (isLoading) {
        return (
            <div className="loading">
                <div className="spinner"></div>
                <div className="shadow"></div>
            </div>
        )
    }
    return (
        <div>
            <BrowserRouter>
                <Routes>
                    <Route path="/" element={<Master />}>
                        <Route path="" element={<Welcome />} />
                        <Route path="home" element={<Body />}>
                            <Route path="aboutUs" element={<StoriesContent />} />
                        </Route>
                    </Route>
                </Routes>
            </BrowserRouter>

            <ToastContainer
                position="top-right"
                autoClose={5000}
                hideProgressBar={false}
                newestOnTop={false}
                closeOnClick
                rtl={false}
                pauseOnFocusLoss
                draggable
                pauseOnHover
                style={{ marginTop: '65px'}}
            />
        </div>
    );
}

export default App;


