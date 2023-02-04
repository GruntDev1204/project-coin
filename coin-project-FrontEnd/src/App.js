import React from 'react';
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
  return (
      <>
        <BrowserRouter>
          <Routes>
            <Route path="/" element={<Master/>}>
              <Route path="" element={<Welcome/>}/>
              <Route path="home" element={<Body/>}>
                <Route path="" element={<Introduce/>}>
                     <Route path="aboutUs" element={<StoriesContent/>}/>
                </Route>
                <Route path="Rmap" element={<RMap/>}/>
                <Route path="Tokenomic" element={<Tokenomic/>}/>
                <Route path="Team" element={<TeamMember/>}/>
                <Route path="Partnership" element={<Partnership/>}/>
              </Route>
            </Route>
          </Routes>
        </BrowserRouter>
      </>
  );
}

export default App;
