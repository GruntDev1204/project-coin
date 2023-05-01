import React, { useEffect } from "react";
import { useState, useRef } from "react";
import { Link, Outlet } from "react-router-dom";
import axios from 'axios';


export default function StoriesContent(){
    const[dataIntro , setIntro]= useState([]);
    const ShowData = () => {
        axios.get('http://sndg.local/api/Sndg/introduce')
            .then(res =>{
                setIntro(res.data.dataIntroduce)
            })
    }
    useEffect(()=>{
        ShowData()
    },[])

    return (
        <>
            <div className="form-stories">
            <div className="area-title-str">
                    <h3 className="title-stories"><i className="fa-solid fa-book"></i> SNDG Stories</h3>
                    <Link to="/home"><i className="fa-solid fa-xmark close"></i></Link>
                </div>
                <div className="content-str">
                {dataIntro?.map(key => (
                    <h3 className="text-content-intro">
                         {key.content}
                    </h3>
                ))}
                </div>

            </div>
        </>
    )
}
