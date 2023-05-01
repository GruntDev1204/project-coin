import React, { useEffect } from "react";
import { useState, useRef } from "react";
import { Link, Outlet } from "react-router-dom";
import axios from 'axios';


export default function Footer() {
    const [allLink, setLink] = useState([])
    const ShowLink = () => {
        axios
            .get('http://sndg.local/api/Sndg/link')
            .then((res) => {
                setLink(res.data.dataLink)
            })
    }
    useEffect(() => {
        ShowLink()
    }, [])

    return (
        <>
            <h3 className="footer-title"> Join our ever-growing community </h3>
            {allLink.map((key) => (
                <div className="content-footer" key={key.id}>
                    <div className="list">
                        <i className="fa-brands fa-gitlab "></i>
                        <a href={key.GitLab} target={"_blank"} className="describe">GitLab</a>
                    </div>
                    <div className="list">
                        <i className="fa-brands fa-github"></i>
                        <a target={"_blank"} href={key.GitHub} className="describe">GitHub</a>
                    </div>
                    <div className="list">
                        <i className="fa-brands fa-telegram "></i>
                        <a href={key.TeleGram} target={"_blank"} className="describe">Telegram</a>
                    </div>
                    <div className="list">
                        <i className="fa-brands fa-twitter"></i>
                        <a target={"_blank"} href={key.Twitter} className="describe">Twitter</a>
                    </div>
                </div>
            ))}
        </>

    )
}
