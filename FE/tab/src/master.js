import React from "react";
import Header from "./component/header";
import Body from "./component/body";
import Footer from "./component/footer";
import { Outlet } from "react-router-dom";


export default function Master() {
    return (
        <>
            <div className="header">
                <Header />
            </div>
            <div className="boddy">
                <Outlet/>
            </div>
            <div className="footer">
                <Footer />
            </div>
        </>

    )
}
