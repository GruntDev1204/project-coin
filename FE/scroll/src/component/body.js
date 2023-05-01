import React from "react";
import Introduce from '../component/body/Introduce';
import RMap from '../component/body/RoadMap';
import TeamMember from '../component/body/team';
import Tokenomic from '../component/body/tokenomic';
import Partnership from '../component/body/Partner';
import { Link as ScrollLink } from 'react-scroll';



export default function Body() {
    return (
        <>
            <div className="thanh-menu">
                <ul>
                    <li>
                        <ScrollLink
                            activeClass="active" to="introduce" spy={true}
                            smooth={true}
                            hashSpy={true}
                            offset={-100}
                            duration={600}
                            delay={0}
                        >
                            Introduce
                        </ScrollLink>
                    </li>
                    <li>
                        <ScrollLink
                            activeClass="active" to="Tokenomics" spy={true}
                            smooth={true}
                            hashSpy={true}
                            offset={-100}
                            duration={600}
                            delay={0}
                        >
                            Tokenomic
                        </ScrollLink>
                    </li>
                    <li>
                        <ScrollLink
                            activeClass="active" to="Rmap" spy={true}
                            smooth={true}
                            hashSpy={true}
                            offset={-100}
                            duration={600}
                            delay={0}
                        >
                            RoadMap
                        </ScrollLink>
                    </li>
                    <li>
                        <ScrollLink
                            activeClass="active" to="Team" spy={true}
                            smooth={true}
                            hashSpy={true}
                            offset={-100}
                            duration={600}
                            delay={0}
                        >
                            Team
                        </ScrollLink>
                    </li>
                    <li>
                        <ScrollLink
                            activeClass="active" to="Paner" spy={true}
                            smooth={true}
                            hashSpy={true}
                            offset={-100}
                            duration={600}
                            delay={0}
                        >
                            Partnership
                        </ScrollLink>
                    </li>
                </ul>
            </div>
            <div className="Menu-area">
                <section id="introduce">
                    <Introduce />
                </section>
                <section id="Tokenomics">
                <Tokenomic/>
                </section>
                <section id="Rmap">
                <RMap/>
                </section>
                <section id="Team">
                <TeamMember/>
                </section>
                <section id="Paner">
                <Partnership/>
                </section>
            </div>
        </>
    )
}
