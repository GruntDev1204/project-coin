import React from "react";
import { Outlet } from "react-router-dom";
import Thanhmenu from "./body/thanhmenu";

export default function Body() {
    return (
        <>
            <Thanhmenu/>
            <div className="Menu-area">
                <Outlet/>
            </div>
        </>
    )
}