import React, { useEffect, useState } from "react";
import axios from "axios";



export default function TeamMember(){
    const[members , setMember] = useState([])
    function showMember(){
         axios.get('http://sndg.local/api/Sndg/member')
            .then((res)=>{
                if(res.data.status){
                    setMember(res.data.dataInfoManager)
                }
            })
    }
    useEffect(()=>{
        showMember()
    },[])
    return(
     <div className="form-Member">
        <div className='title-font'>Our Team</div>
        <div className="content-member" >
            {members?.map(key => (
            <div className="member" key={key.id} >
                <img className="logo-list" src={'http://sndg.local/'+ key.avatar}></img>
                <p className="name-member">{key.fullName}</p>
                <p className="des-member">{key.vai_tro}</p>
            </div>
            ))}

        </div>
     </div>
   )
}
