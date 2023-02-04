import React, { useEffect } from "react";
import Logo from "../../img/dogelogo.png"
import { useState, useRef } from "react";
import Floky from "./IntroduceComponent/Floky-Intro";
import { Link, Outlet } from "react-router-dom";
import axios from 'axios';

export default function Introduce() {
    const[dataIntro , setIntro]= useState([]);
    const[allLink , setLink] = useState([]);

    const ShowData = () => {
        axios.get('http://127.0.0.1:8000/api/Sndg/introduce')
            .then(res =>{
                setIntro(res.data.dataIntroduce)
            })
    }
    const ShowLink = () => {
        axios
            .get('http://localhost:8000/api/Sndg/link')
            .then((res)=> {
                setLink(res.data.dataLink)
            })
    }
    useEffect(()=>{
        ShowData()
        ShowLink()
    },[])

    const [copyText, setCopy] = useState('');
    const text = useRef(null);
    function CopyAdd(e) {
        text.current.select();
        e.target.focus();
        document.execCommand('copy');
        setCopy('Copied!');
        alert('Copied!')
    }

    return (
        <>
            <div className="Introduce-Team"  >
                <div className="title lg"><p>INTRODUCE</p></div>
                <div className="form-Intro">
                    <div className="area-info">
                        <div className="Logo-lg"><img src={Logo}></img></div>
                        {dataIntro?.map(key => (
                            <div className="Info-intro" key={key.id}>
                                <div className="Title-Intro">Snope Doge</div>
                                <div className="Tag-Intro" >{key.title_team}</div>
                            </div>
                        ))}
                    </div>

                    {allLink.map(key => (
                    <div className="form-address" key={key.id}>
                        <div className="form-control submit"><input className="input" ref={text} value={key.LinkAddress}></input><p onClick={CopyAdd} >Copy Address</p></div>
                        <p className="Button-str"><Link to="/home/aboutUs">About SNDG</Link></p>
                    </div>
                    ))}
                </div>
                <Outlet/>
                <Floky/>
            </div>
        </>
    )
}
