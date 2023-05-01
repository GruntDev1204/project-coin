import React, { useState, useEffect } from "react";
import Master from './master'
import Body from './component/body';
import { BrowserRouter, Routes, Route } from 'react-router-dom'
import Introduce from './component/body/Introduce';
import RMap from './component/body/RoadMap';
import TeamMember from './component/body/team';
import Partnership from './component/body/Partner';
import Welcome from './component/welcome';
import Tokenomic from './component/body/tokenomic';
import StoriesContent from './component/body/IntroduceComponent/stories';


function App() {
    const [isLoading, setIsLoading] = useState(true);


    useEffect(() => {
        const timer = setTimeout(() => setIsLoading(false), 2500);
        return () => clearTimeout(timer);
    }, []);

    if (isLoading) {
        return (
        <div className="loading">
            <div className="spinner"></div>
            <div className="loading-bar"><div className="color-loading" ></div></div>
        </div>
    )}
    return (
        <div>
            <BrowserRouter>
                <Routes>
                    <Route path="/" element={<Master />}>
                        <Route path="" element={<Welcome />} />
                        <Route path="home" element={<Body />}>
                            <Route path="" element={<Introduce />}>
                                <Route path="aboutUs" element={<StoriesContent />} />
                            </Route>
                            <Route path="Rmap" element={<RMap />} />
                            <Route path="Tokenomic" element={<Tokenomic />} />
                            <Route path="Team" element={<TeamMember />} />
                            <Route path="Partnership" element={<Partnership />} />
                        </Route>
                    </Route>
                </Routes>
            </BrowserRouter>
        </div>
    );
}

export default App;


