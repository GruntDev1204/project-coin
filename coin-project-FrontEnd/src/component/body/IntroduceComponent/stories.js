import React, { useEffect } from "react";
import { useState, useRef } from "react";
import { Link, Outlet } from "react-router-dom";
import axios from 'axios';


export default function StoriesContent(){
    const[dataIntro , setIntro]= useState([]);
    const ShowData = () => {
        axios.get('http://127.0.0.1:8000/api/Sndg/introduce')
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
               <h3 className="title-stories"><i className="fa-solid fa-book"></i> SNDG Stories</h3>
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
