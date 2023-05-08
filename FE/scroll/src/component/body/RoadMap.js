import React, { useState, useEffect } from 'react';
import axios from 'axios';

export default function RMap() {
    const [dataLists, setDataLists] = useState({});

    useEffect(() => {
        axios.get('http://newsndg.local:8000/api/Sndg/RM')
            .then((res) => {
                if (res.data.status === 200) {
                    setDataLists(res.data.dataLists);
                }
            });
    }, []);

    return (
        <div className="timeline">
            <div className='title-RM'>ROADMAP</div>
            {Object.keys(dataLists).map((key) => (
                <React.Fragment key={key}>
                    <div className="timeline-item" >
                        <div className="timeline-icon">
                            <i className="fas fa-business-time"></i>
                        </div>
                        <div className="timeline-content">
                            <h2><i className="fa-solid fa-thumbtack "></i> {dataLists[key][0].phase}</h2>
                            {dataLists[key].map((todo) => (
                                <>
                                    <p key={todo.id}>
                                    {todo.is_done ? (
                                        <i className="fas fa-check circle-checking"></i>
                                    ) : (
                                        <i className="fas fa-hourglass circle-loading"></i>
                                    )}  {todo.content}</p>
                                </>
                            ))}
                        </div>
                    </div>
                    <div className="line-connect"></div>
                </React.Fragment>
            ))}
            <div className='up-to'> Up Coming</div>
        </div>
    );
}
