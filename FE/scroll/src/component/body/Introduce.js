import React, { useEffect } from "react";
import Logo from "../../img/dogelogo.png"
import { useState, useRef } from "react";
import Floky from "./IntroduceComponent/Floky-Intro";
import { Link, Outlet } from "react-router-dom";
import { Link   as ScrollLink } from "react-scroll";
import axios from 'axios';

export default function Introduce() {
    const[dataIntro , setIntro]= useState([]);
    const[allLink , setLink] = useState([]);

    const ShowData = () => {
        axios.get('http://sndg.local/api/Sndg/introduce')
            .then(res =>{
                setIntro(res.data.dataIntroduce)
            })
    }
    const ShowLink = () => {
        axios
            .get('http://sndg.local/api/Sndg/link')
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
                <div className="title-font"><p>INTRODUCE</p></div>
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

                    <div className="form-address" >
                        {allLink.map(key => (
                             <div key={key.id} className="form-control submit"><input className="input" ref={text} defaultValue={key.LinkAddress}></input><p className="button" onClick={CopyAdd} >Copy Address</p></div>
                        ))}
                        <p className="button"><Link to="/home/aboutUs" > About SNDG</Link></p>

                    </div>
                </div>
                <Outlet/>
                <Floky />
            </div>

        </>
    )
}
