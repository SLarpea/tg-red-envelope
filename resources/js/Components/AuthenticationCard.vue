<template>
    <div>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 new-bg">
        <div style="z-index: 2;">
            <slot name="logo" />
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset; z-index: 2;">
            <slot />
        </div>
    </div>

    <div v-for="index in 600" :key="index" class="particle" :id="'particle' + index"></div>

</div>

</template>

<style scoped>

.new-bg {
    background: radial-gradient(ellipse at bottom, #512da8 0%, #0c0d13 100%);
}

.particle {
z-index: 1;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  margin: auto;
  width: 15vmin;
  height: 15vmin;
  border-radius: 50%;
  box-shadow: 0 3vmin 3vmin rgba(0, 0, 0, 0.3), 0 -6vmin 3vmin rgba(0, 0, 0, 0.1) inset, 0 9vmin 3vmin rgba(255, 255, 255, 0.1) inset;
  opacity: 0;
  animation: doit 2500ms infinite cubic-bezier(0.125, 0, 0.41, 0);
  animation-direction: reverse;
  background-color: #7652ca;
}

#particle1 {
  transform: translateX(-30.2595vmin) translateY(3.82266vmin) scale(0.18185);
  animation-delay: -2384ms;
}

#particle2 {
  transform: translateX(-1.66395vmin) translateY(26.44771vmin) scale(0.26037);
  animation-delay: -1751ms;
}

#particle3 {
  transform: translateX(-46.60177vmin) translateY(15.14183vmin) scale(0.00049);
  animation-delay: -1682ms;
}

#particle4 {
  transform: translateX(-31.86039vmin) translateY(-10.35207vmin) scale(0.13137);
  animation-delay: -114ms;
}

#particle5 {
  transform: translateX(-3.84132vmin) translateY(-20.13689vmin) scale(0.39958);
  animation-delay: -2101ms;
}

#particle6 {
  transform: translateX(38.58572vmin) translateY(-15.27717vmin) scale(0.03544);
  animation-delay: -536ms;
}

#particle7 {
  transform: translateX(-24.11221vmin) translateY(-37.99476vmin) scale(0.01231);
  animation-delay: -1992ms;
}

#particle8 {
  transform: translateX(-22.34488vmin) translateY(18.4853vmin) scale(0.20984);
  animation-delay: -20ms;
}

#particle9 {
  transform: translateX(-15.53898vmin) translateY(-24.48551vmin) scale(0.20984);
  animation-delay: -1758ms;
}

#particle10 {
  transform: translateX(-2.00861vmin) translateY(6.18187vmin) scale(0.79721);
  animation-delay: -313ms;
}

#particle11 {
  transform: translateX(-12.77338vmin) translateY(-27.14481vmin) scale(0.19098);
  animation-delay: -2355ms;
}

#particle12 {
  transform: translateX(-2.444vmin) translateY(19.34624vmin) scale(0.42499);
  animation-delay: -699ms;
}

#particle13 {
  transform: translateX(-24.42045vmin) translateY(-22.93233vmin) scale(0.13137);
  animation-delay: -706ms;
}

#particle14 {
  transform: translateX(-10.17012vmin) translateY(2.61124vmin) scale(0.67608);
  animation-delay: -2337ms;
}

#particle15 {
  transform: translateX(-6.74573vmin) translateY(35.36234vmin) scale(0.09517);
  animation-delay: -45ms;
}

#particle16 {
  transform: translateX(9.08799vmin) translateY(-47.64093vmin) scale(0.00111);
  animation-delay: -1905ms;
}

#particle17 {
  transform: translateX(-13.00735vmin) translateY(23.66028vmin) scale(0.24989);
  animation-delay: -550ms;
}

#particle18 {
  transform: translateX(8.18895vmin) translateY(25.203vmin) scale(0.26037);
  animation-delay: -730ms;
}

#particle19 {
  transform: translateX(3.63466vmin) translateY(-28.77133vmin) scale(0.20984);
  animation-delay: -1500ms;
}

#particle20 {
  transform: translateX(-40.1962vmin) translateY(-10.32063vmin) scale(0.03544);
  animation-delay: -1506ms;
}

#particle21 {
  transform: translateX(-43vmin) translateY(0vmin) scale(0.02408);
  animation-delay: -926ms;
}

#particle22 {
  transform: translateX(13.13322vmin) translateY(40.4199vmin) scale(0.02763);
  animation-delay: -1819ms;
}

#particle23 {
  transform: translateX(20.35861vmin) translateY(9.58003vmin) scale(0.35055);
  animation-delay: -1061ms;
}

#particle24 {
  transform: translateX(-28.44376vmin) translateY(1.78953vmin) scale(0.21957);
  animation-delay: -1940ms;
}

#particle25 {
  transform: translateX(-34.83584vmin) translateY(-16.3925vmin) scale(0.06456);
  animation-delay: -1929ms;
}

#particle26 {
  transform: translateX(22.37469vmin) translateY(14.19941vmin) scale(0.26037);
  animation-delay: -936ms;
}

#particle27 {
  transform: translateX(30.2522vmin) translateY(-28.4087vmin) scale(0.03544);
  animation-delay: -2384ms;
}

#particle28 {
  transform: translateX(26.01279vmin) translateY(-27.70081vmin) scale(0.07022);
  animation-delay: -1742ms;
}

#particle29 {
  transform: translateX(46.12624vmin) translateY(-14.98732vmin) scale(0.00111);
  animation-delay: -558ms;
}

#particle30 {
  transform: translateX(8.65093vmin) translateY(-21.84975vmin) scale(0.32699);
  animation-delay: -1607ms;
}

#particle31 {
  transform: translateX(35.05227vmin) translateY(19.27015vmin) scale(0.04894);
  animation-delay: -2102ms;
}

#particle32 {
  transform: translateX(-29.00722vmin) translateY(-9.42502vmin) scale(0.18185);
  animation-delay: -431ms;
}

#particle33 {
  transform: translateX(0vmin) translateY(-39vmin) scale(0.05912);
  animation-delay: -1938ms;
}

#particle34 {
  transform: translateX(0vmin) translateY(41vmin) scale(0.03971);
  animation-delay: -1049ms;
}

#particle35 {
  transform: translateX(-41.17276vmin) translateY(-5.20133vmin) scale(0.03544);
  animation-delay: -186ms;
}

#particle36 {
  transform: translateX(-5.20133vmin) translateY(41.17276vmin) scale(0.03544);
  animation-delay: -209ms;
}

#particle37 {
  transform: translateX(36.59938vmin) translateY(-30.27764vmin) scale(0.00308);
  animation-delay: -1830ms;
}

#particle38 {
  transform: translateX(46.65864vmin) translateY(8.90061vmin) scale(0.00308);
  animation-delay: -221ms;
}

#particle39 {
  transform: translateX(-24.06604vmin) translateY(-4.59084vmin) scale(0.30409);
  animation-delay: -320ms;
}

#particle40 {
  transform: translateX(-37.68119vmin) translateY(-20.71541vmin) scale(0.02408);
  animation-delay: -533ms;
}

#particle41 {
  transform: translateX(18.22217vmin) translateY(46.02394vmin) scale(0.00012);
  animation-delay: -596ms;
}

#particle42 {
  transform: translateX(14.63975vmin) translateY(12.11106vmin) scale(0.43792);
  animation-delay: -1494ms;
}

#particle43 {
  transform: translateX(-17.66998vmin) translateY(-44.62927vmin) scale(0.00197);
  animation-delay: -2204ms;
}

#particle44 {
  transform: translateX(45.09416vmin) translateY(-17.85404vmin) scale(0.00111);
  animation-delay: -949ms;
}

#particle45 {
  transform: translateX(15.96672vmin) translateY(-33.93101vmin) scale(0.07612);
  animation-delay: -660ms;
}

#particle46 {
  transform: translateX(-3.50933vmin) translateY(27.77921vmin) scale(0.22949);
  animation-delay: -2103ms;
}

#particle47 {
  transform: translateX(2.10348vmin) translateY(33.4339vmin) scale(0.13137);
  animation-delay: -350ms;
}

#particle48 {
  transform: translateX(-38.99565vmin) translateY(21.43804vmin) scale(0.01489);
  animation-delay: -126ms;
}

#particle49 {
  transform: translateX(-4.07333vmin) translateY(32.24373vmin) scale(0.14736);
  animation-delay: -47ms;
}

#particle50 {
  transform: translateX(-29.93363vmin) translateY(-21.74805vmin) scale(0.08225);
  animation-delay: -140ms;
}

#particle51 {
  transform: translateX(6.71463vmin) translateY(-26.15175vmin) scale(0.24989);
  animation-delay: -1791ms;
}

#particle52 {
  transform: translateX(35.22007vmin) translateY(4.44933vmin) scale(0.10197);
  animation-delay: -2455ms;
}

#particle53 {
  transform: translateX(7.33635vmin) translateY(28.5732vmin) scale(0.20032);
  animation-delay: -2402ms;
}

#particle54 {
  transform: translateX(48.11756vmin) translateY(6.07866vmin) scale(0.00111);
  animation-delay: -1449ms;
}

#particle55 {
  transform: translateX(-42.5vmin) translateY(0vmin) scale(0.02763);
  animation-delay: -2400ms;
}

#particle56 {
  transform: translateX(-28.70715vmin) translateY(18.21811vmin) scale(0.12369);
  animation-delay: -684ms;
}

#particle57 {
  transform: translateX(27.09052vmin) translateY(-32.74681vmin) scale(0.02763);
  animation-delay: -2289ms;
}

#particle58 {
  transform: translateX(11.93711vmin) translateY(-46.49199vmin) scale(0.00197);
  animation-delay: -2417ms;
}

#particle59 {
  transform: translateX(16.45799vmin) translateY(22.65248vmin) scale(0.22949);
  animation-delay: -2409ms;
}

#particle60 {
  transform: translateX(20.4186vmin) translateY(16.89174vmin) scale(0.26037);
  animation-delay: -571ms;
}

#particle61 {
  transform: translateX(-15.65699vmin) translateY(-28.47997vmin) scale(0.14736);
  animation-delay: -1602ms;
}

#particle62 {
  transform: translateX(-6.71463vmin) translateY(26.15175vmin) scale(0.24989);
  animation-delay: -1701ms;
}

#particle63 {
  transform: translateX(-29.12461vmin) translateY(-21.16027vmin) scale(0.09517);
  animation-delay: -1712ms;
}

#particle64 {
  transform: translateX(1.44526vmin) translateY(-2.62892vmin) scale(0.90589);
  animation-delay: -1505ms;
}

#particle65 {
  transform: translateX(0vmin) translateY(-47vmin) scale(0.00444);
  animation-delay: -1596ms;
}

#particle66 {
  transform: translateX(40.52774vmin) translateY(25.71969vmin) scale(0.00197);
  animation-delay: -1984ms;
}

#particle67 {
  transform: translateX(-21.16027vmin) translateY(29.12461vmin) scale(0.09517);
  animation-delay: -88ms;
}

#particle68 {
  transform: translateX(-11.68842vmin) translateY(45.52341vmin) scale(0.00444);
  animation-delay: -1856ms;
}

#particle69 {
  transform: translateX(6.42992vmin) translateY(-10.13194vmin) scale(0.63188);
  animation-delay: -1538ms;
}

#particle70 {
  transform: translateX(-33.77312vmin) translateY(-21.43307vmin) scale(0.04894);
  animation-delay: -2081ms;
}

#particle71 {
  transform: translateX(18.06576vmin) translateY(-32.8615vmin) scale(0.07612);
  animation-delay: -1272ms;
}

#particle72 {
  transform: translateX(41.18641vmin) translateY(-22.64242vmin) scale(0.00444);
  animation-delay: -961ms;
}

#particle73 {
  transform: translateX(8.70415vmin) translateY(33.90041vmin) scale(0.10899);
  animation-delay: -1427ms;
}

#particle74 {
  transform: translateX(30.46235vmin) translateY(32.4391vmin) scale(0.01489);
  animation-delay: -543ms;
}

#particle75 {
  transform: translateX(26.52343vmin) translateY(41.79423vmin) scale(0.00012);
  animation-delay: -244ms;
}

#particle76 {
  transform: translateX(-17.30185vmin) translateY(-43.69949vmin) scale(0.00444);
  animation-delay: -762ms;
}

#particle77 {
  transform: translateX(3.37228vmin) translateY(-6.13415vmin) scale(0.78186);
  animation-delay: -1441ms;
}

#particle78 {
  transform: translateX(-33.77312vmin) translateY(21.43307vmin) scale(0.04894);
  animation-delay: -570ms;
}

#particle79 {
  transform: translateX(21.84975vmin) translateY(8.65093vmin) scale(0.32699);
  animation-delay: -612ms;
}

#particle80 {
  transform: translateX(-46.13333vmin) translateY(-5.828vmin) scale(0.00604);
  animation-delay: -2087ms;
}

#particle81 {
  transform: translateX(29.95893vmin) translateY(36.21412vmin) scale(0.00444);
  animation-delay: -1082ms;
}

#particle82 {
  transform: translateX(-22.62068vmin) translateY(-10.64448vmin) scale(0.29289);
  animation-delay: -1981ms;
}

#particle83 {
  transform: translateX(8.95284vmin) translateY(34.86899vmin) scale(0.09517);
  animation-delay: -1419ms;
}

#particle84 {
  transform: translateX(-45.18521vmin) translateY(8.61954vmin) scale(0.00789);
  animation-delay: -145ms;
}

#particle85 {
  transform: translateX(24.6437vmin) translateY(26.24287vmin) scale(0.09517);
  animation-delay: -1926ms;
}

#particle86 {
  transform: translateX(8.90061vmin) translateY(-46.65864vmin) scale(0.00308);
  animation-delay: -1411ms;
}

#particle87 {
  transform: translateX(-30.4509vmin) translateY(5.80882vmin) scale(0.17292);
  animation-delay: -2235ms;
}

#particle88 {
  transform: translateX(28.04964vmin) translateY(13.19916vmin) scale(0.17292);
  animation-delay: -884ms;
}

#particle89 {
  transform: translateX(-22.59261vmin) translateY(-4.30977vmin) scale(0.33869);
  animation-delay: -715ms;
}

#particle90 {
  transform: translateX(2.88836vmin) translateY(-45.90923vmin) scale(0.00789);
  animation-delay: -861ms;
}

#particle91 {
  transform: translateX(1.692vmin) translateY(-13.39355vmin) scale(0.58849);
  animation-delay: -1613ms;
}

#particle92 {
  transform: translateX(-29.12461vmin) translateY(-21.16027vmin) scale(0.09517);
  animation-delay: -88ms;
}

#particle93 {
  transform: translateX(-33.02619vmin) translateY(15.54094vmin) scale(0.0886);
  animation-delay: -546ms;
}

#particle94 {
  transform: translateX(-11.07026vmin) translateY(23.5255vmin) scale(0.27103);
  animation-delay: -2496ms;
}

#particle95 {
  transform: translateX(0vmin) translateY(-32vmin) scale(0.15567);
  animation-delay: -148ms;
}

#particle96 {
  transform: translateX(-20.47453vmin) translateY(-37.24303vmin) scale(0.02763);
  animation-delay: -2229ms;
}

#particle97 {
  transform: translateX(25.14942vmin) translateY(23.61688vmin) scale(0.11623);
  animation-delay: -1763ms;
}

#particle98 {
  transform: translateX(8.43069vmin) translateY(-15.33537vmin) scale(0.4775);
  animation-delay: -918ms;
}

#particle99 {
  transform: translateX(-28.50758vmin) translateY(39.23732vmin) scale(0.00111);
  animation-delay: -1017ms;
}

#particle100 {
  transform: translateX(33.97871vmin) translateY(-24.68698vmin) scale(0.03142);
  animation-delay: -1374ms;
}

#particle101 {
  transform: translateX(-20.26387vmin) translateY(-12.85984vmin) scale(0.31545);
  animation-delay: -2313ms;
}

#particle102 {
  transform: translateX(32.4391vmin) translateY(30.46235vmin) scale(0.01489);
  animation-delay: -181ms;
}

#particle103 {
  transform: translateX(13.13322vmin) translateY(-40.4199vmin) scale(0.02763);
  animation-delay: -2385ms;
}

#particle104 {
  transform: translateX(-11.32624vmin) translateY(-8.22899vmin) scale(0.57422);
  animation-delay: -95ms;
}

#particle105 {
  transform: translateX(0vmin) translateY(-14.5vmin) scale(0.56006);
  animation-delay: -1003ms;
}

#particle106 {
  transform: translateX(-28.89425vmin) translateY(23.9034vmin) scale(0.07612);
  animation-delay: -248ms;
}

#particle107 {
  transform: translateX(23.9034vmin) translateY(28.89425vmin) scale(0.07612);
  animation-delay: -1634ms;
}

#particle108 {
  transform: translateX(20.77561vmin) translateY(19.50959vmin) scale(0.21957);
  animation-delay: -195ms;
}

#particle109 {
  transform: translateX(-24.72747vmin) translateY(-8.03444vmin) scale(0.27103);
  animation-delay: -2245ms;
}

#particle110 {
  transform: translateX(18.16658vmin) translateY(-21.95963vmin) scale(0.21957);
  animation-delay: -1531ms;
}

#particle111 {
  transform: translateX(-4.12239vmin) translateY(-21.61032vmin) scale(0.36258);
  animation-delay: -1726ms;
}

#particle112 {
  transform: translateX(28.5732vmin) translateY(-7.33635vmin) scale(0.20032);
  animation-delay: -2393ms;
}

#particle113 {
  transform: translateX(5.71987vmin) translateY(-22.27741vmin) scale(0.33869);
  animation-delay: -2488ms;
}

#particle114 {
  transform: translateX(-17.5vmin) translateY(0vmin) scale(0.4775);
  animation-delay: -2297ms;
}

#particle115 {
  transform: translateX(39.4338vmin) translateY(21.67892vmin) scale(0.01231);
  animation-delay: -2310ms;
}

#particle116 {
  transform: translateX(-1.03604vmin) translateY(-16.46744vmin) scale(0.50454);
  animation-delay: -1178ms;
}

#particle117 {
  transform: translateX(40.04634vmin) translateY(29.09537vmin) scale(0.00012);
  animation-delay: -2284ms;
}

#particle118 {
  transform: translateX(28.4087vmin) translateY(-30.2522vmin) scale(0.03544);
  animation-delay: -1338ms;
}

#particle119 {
  transform: translateX(44.07053vmin) translateY(11.31539vmin) scale(0.00998);
  animation-delay: -2319ms;
}

#particle120 {
  transform: translateX(5.87132vmin) translateY(-18.07007vmin) scale(0.43792);
  animation-delay: -2077ms;
}

#particle121 {
  transform: translateX(20.22542vmin) translateY(14.69463vmin) scale(0.29289);
  animation-delay: -1258ms;
}

#particle122 {
  transform: translateX(-32.74681vmin) translateY(-27.09052vmin) scale(0.02763);
  animation-delay: -990ms;
}

#particle123 {
  transform: translateX(14.98732vmin) translateY(46.12624vmin) scale(0.00111);
  animation-delay: -13ms;
}

#particle124 {
  transform: translateX(35.42995vmin) translateY(-2.22906vmin) scale(0.10197);
  animation-delay: -747ms;
}

#particle125 {
  transform: translateX(-27.59723vmin) translateY(12.98627vmin) scale(0.18185);
  animation-delay: -1853ms;
}

#particle126 {
  transform: translateX(-7.12049vmin) translateY(37.32692vmin) scale(0.07022);
  animation-delay: -2247ms;
}

#particle127 {
  transform: translateX(-26.44771vmin) translateY(1.66395vmin) scale(0.26037);
  animation-delay: -318ms;
}

#particle128 {
  transform: translateX(9.50068vmin) translateY(4.47068vmin) scale(0.67608);
  animation-delay: -1883ms;
}

#particle129 {
  transform: translateX(2.95515vmin) translateY(-1.87539vmin) scale(0.89027);
  animation-delay: -1645ms;
}

#particle130 {
  transform: translateX(-37.29045vmin) translateY(-9.57456vmin) scale(0.06456);
  animation-delay: -446ms;
}

#particle131 {
  transform: translateX(30.99466vmin) translateY(7.95808vmin) scale(0.15567);
  animation-delay: -1412ms;
}

#particle132 {
  transform: translateX(-10.12343vmin) translateY(-25.56885vmin) scale(0.23959);
  animation-delay: -2345ms;
}

#particle133 {
  transform: translateX(-2.57441vmin) translateY(40.9191vmin) scale(0.03971);
  animation-delay: -761ms;
}

#particle134 {
  transform: translateX(20.39757vmin) translateY(24.65642vmin) scale(0.15567);
  animation-delay: -2267ms;
}

#particle135 {
  transform: translateX(-18.22134vmin) translateY(-25.07953vmin) scale(0.17292);
  animation-delay: -1671ms;
}

#particle136 {
  transform: translateX(25.14942vmin) translateY(-23.61688vmin) scale(0.11623);
  animation-delay: -2013ms;
}

#particle137 {
  transform: translateX(-34.78773vmin) translateY(-25.27477vmin) scale(0.02408);
  animation-delay: -1048ms;
}

#particle138 {
  transform: translateX(2.54302vmin) translateY(40.42008vmin) scale(0.04421);
  animation-delay: -2500ms;
}

#particle139 {
  transform: translateX(-13.51906vmin) translateY(-18.60739vmin) scale(0.33869);
  animation-delay: -2063ms;
}

#particle140 {
  transform: translateX(9.27051vmin) translateY(28.5317vmin) scale(0.19098);
  animation-delay: -772ms;
}

#particle141 {
  transform: translateX(-2.632vmin) translateY(-20.83441vmin) scale(0.38709);
  animation-delay: -2090ms;
}

#particle142 {
  transform: translateX(-24.64803vmin) translateY(-38.83908vmin) scale(0.00789);
  animation-delay: -1841ms;
}

#particle143 {
  transform: translateX(23.84681vmin) translateY(43.37718vmin) scale(0.00012);
  animation-delay: -471ms;
}

#particle144 {
  transform: translateX(-8.52585vmin) translateY(44.69407vmin) scale(0.00998);
  animation-delay: -1319ms;
}

#particle145 {
  transform: translateX(44.41219vmin) translateY(2.79418vmin) scale(0.01489);
  animation-delay: -32ms;
}

#particle146 {
  transform: translateX(46vmin) translateY(0vmin) scale(0.00789);
  animation-delay: -2418ms;
}

#particle147 {
  transform: translateX(14.06027vmin) translateY(-43.27307vmin) scale(0.00998);
  animation-delay: -50ms;
}

#particle148 {
  transform: translateX(-25.78757vmin) translateY(12.13471vmin) scale(0.21957);
  animation-delay: -2185ms;
}

#particle149 {
  transform: translateX(-10.81559vmin) translateY(-33.28698vmin) scale(0.10899);
  animation-delay: -1231ms;
}

#particle150 {
  transform: translateX(-32.54218vmin) translateY(12.88436vmin) scale(0.10899);
  animation-delay: -1220ms;
}

#particle151 {
  transform: translateX(0vmin) translateY(-24.5vmin) scale(0.30409);
  animation-delay: -601ms;
}

#particle152 {
  transform: translateX(20.6503vmin) translateY(-43.88411vmin) scale(0.00111);
  animation-delay: -2399ms;
}

#particle153 {
  transform: translateX(41.64908vmin) translateY(10.69367vmin) scale(0.02408);
  animation-delay: -1831ms;
}

#particle154 {
  transform: translateX(-30.43381vmin) translateY(9.88854vmin) scale(0.15567);
  animation-delay: -2002ms;
}

#particle155 {
  transform: translateX(-30.23258vmin) translateY(-16.6205vmin) scale(0.11623);
  animation-delay: -858ms;
}

#particle156 {
  transform: translateX(30.67073vmin) translateY(16.86138vmin) scale(0.10899);
  animation-delay: -2129ms;
}

#particle157 {
  transform: translateX(-21.67892vmin) translateY(-39.4338vmin) scale(0.01231);
  animation-delay: -1433ms;
}

#particle158 {
  transform: translateX(-9.7553vmin) translateY(-24.63908vmin) scale(0.26037);
  animation-delay: -2214ms;
}

#particle159 {
  transform: translateX(13.59675vmin) translateY(41.84649vmin) scale(0.01771);
  animation-delay: -2215ms;
}

#particle160 {
  transform: translateX(28.36537vmin) translateY(-34.28784vmin) scale(0.01489);
  animation-delay: -1088ms;
}

#particle161 {
  transform: translateX(4.37381vmin) translateY(4.10728vmin) scale(0.81262);
  animation-delay: -1019ms;
}

#particle162 {
  transform: translateX(-44.20293vmin) translateY(8.43216vmin) scale(0.01231);
  animation-delay: -272ms;
}

#particle163 {
  transform: translateX(14.96681vmin) translateY(-10.87403vmin) scale(0.45098);
  animation-delay: -652ms;
}

#particle164 {
  transform: translateX(-21.99113vmin) translateY(26.58271vmin) scale(0.11623);
  animation-delay: -479ms;
}

#particle165 {
  transform: translateX(-42.07446vmin) translateY(-19.79874vmin) scale(0.00604);
  animation-delay: -1153ms;
}

#particle166 {
  transform: translateX(-31.55166vmin) translateY(22.92362vmin) scale(0.05912);
  animation-delay: -1714ms;
}

#particle167 {
  transform: translateX(37.426vmin) translateY(2.35464vmin) scale(0.07612);
  animation-delay: -900ms;
}

#particle168 {
  transform: translateX(2.26046vmin) translateY(-35.92896vmin) scale(0.09517);
  animation-delay: -1849ms;
}

#particle169 {
  transform: translateX(-7.53002vmin) translateY(8.01865vmin) scale(0.66126);
  animation-delay: -2031ms;
}

#particle170 {
  transform: translateX(-35.92896vmin) translateY(-2.26046vmin) scale(0.09517);
  animation-delay: -1993ms;
}

#particle171 {
  transform: translateX(14.67831vmin) translateY(-45.17518vmin) scale(0.00308);
  animation-delay: -1281ms;
}

#particle172 {
  transform: translateX(-29.52323vmin) translateY(27.72416vmin) scale(0.04421);
  animation-delay: -679ms;
}

#particle173 {
  transform: translateX(-38.83282vmin) translateY(28.21369vmin) scale(0.00197);
  animation-delay: -2273ms;
}

#particle174 {
  transform: translateX(27.91109vmin) translateY(20.27859vmin) scale(0.11623);
  animation-delay: -1253ms;
}

#particle175 {
  transform: translateX(1.62933vmin) translateY(-12.89749vmin) scale(0.60285);
  animation-delay: -2287ms;
}

#particle176 {
  transform: translateX(-39.78263vmin) translateY(7.58894vmin) scale(0.04421);
  animation-delay: -1669ms;
}

#particle177 {
  transform: translateX(11.31034vmin) translateY(-5.32224vmin) scale(0.61732);
  animation-delay: -1185ms;
}

#particle178 {
  transform: translateX(1.81733vmin) translateY(14.38566vmin) scale(0.56006);
  animation-delay: -2378ms;
}

#particle179 {
  transform: translateX(33.88508vmin) translateY(-36.08395vmin) scale(0.00012);
  animation-delay: -342ms;
}

#particle180 {
  transform: translateX(-32.76519vmin) translateY(-23.8053vmin) scale(0.04421);
  animation-delay: -239ms;
}

#particle181 {
  transform: translateX(47.0773vmin) translateY(15.29634vmin) scale(0.00012);
  animation-delay: -863ms;
}

#particle182 {
  transform: translateX(45.17518vmin) translateY(14.67831vmin) scale(0.00308);
  animation-delay: -947ms;
}

#particle183 {
  transform: translateX(-23.08375vmin) translateY(-4.40346vmin) scale(0.32699);
  animation-delay: -737ms;
}

#particle184 {
  transform: translateX(2.9981vmin) translateY(-15.7166vmin) scale(0.51825);
  animation-delay: -819ms;
}

#particle185 {
  transform: translateX(-48.13208vmin) translateY(9.18168vmin) scale(0.00049);
  animation-delay: -1892ms;
}

#particle186 {
  transform: translateX(28.36537vmin) translateY(-34.28784vmin) scale(0.01489);
  animation-delay: -521ms;
}

#particle187 {
  transform: translateX(-34.17596vmin) translateY(18.78839vmin) scale(0.05912);
  animation-delay: -979ms;
}

#particle188 {
  transform: translateX(-23.21902vmin) translateY(-14.73524vmin) scale(0.23959);
  animation-delay: -1259ms;
}

#particle189 {
  transform: translateX(10.00581vmin) translateY(-21.26344vmin) scale(0.32699);
  animation-delay: -1779ms;
}

#particle190 {
  transform: translateX(22.94726vmin) translateY(27.73848vmin) scale(0.09517);
  animation-delay: -1415ms;
}

#particle191 {
  transform: translateX(36.3061vmin) translateY(23.04055vmin) scale(0.02408);
  animation-delay: -1259ms;
}

#particle192 {
  transform: translateX(38.11934vmin) translateY(-20.95628vmin) scale(0.02078);
  animation-delay: -180ms;
}

#particle193 {
  transform: translateX(-36.19308vmin) translateY(17.03117vmin) scale(0.04894);
  animation-delay: -740ms;
}

#particle194 {
  transform: translateX(-43.88411vmin) translateY(-20.6503vmin) scale(0.00111);
  animation-delay: -521ms;
}

#particle195 {
  transform: translateX(-20.39757vmin) translateY(-24.65642vmin) scale(0.15567);
  animation-delay: -1246ms;
}

#particle196 {
  transform: translateX(21.19716vmin) translateY(-38.55749vmin) scale(0.01771);
  animation-delay: -1379ms;
}

#particle197 {
  transform: translateX(13.26088vmin) translateY(-2.52965vmin) scale(0.58849);
  animation-delay: -2243ms;
}

#particle198 {
  transform: translateX(35.03961vmin) translateY(-22.23681vmin) scale(0.03544);
  animation-delay: -1810ms;
}

#particle199 {
  transform: translateX(28.12373vmin) translateY(23.26598vmin) scale(0.0886);
  animation-delay: -29ms;
}

#particle200 {
  transform: translateX(11.83014vmin) translateY(-6.50367vmin) scale(0.58849);
  animation-delay: -832ms;
}

#particle201 {
  transform: translateX(-30.61668vmin) translateY(28.75098vmin) scale(0.03142);
  animation-delay: -1119ms;
}

#particle202 {
  transform: translateX(25.27477vmin) translateY(-34.78773vmin) scale(0.02408);
  animation-delay: -38ms;
}

#particle203 {
  transform: translateX(20.03334vmin) translateY(16.57302vmin) scale(0.27103);
  animation-delay: -803ms;
}

#particle204 {
  transform: translateX(34.22796vmin) translateY(-4.324vmin) scale(0.11623);
  animation-delay: -985ms;
}

#particle205 {
  transform: translateX(-12.28472vmin) translateY(22.34582vmin) scale(0.28187);
  animation-delay: -2192ms;
}

#particle206 {
  transform: translateX(-15.34131vmin) translateY(-6.07406vmin) scale(0.50454);
  animation-delay: -539ms;
}

#particle207 {
  transform: translateX(-23.64118vmin) translateY(-15.00315vmin) scale(0.22949);
  animation-delay: -1699ms;
}

#particle208 {
  transform: translateX(12.51519vmin) translateY(38.51779vmin) scale(0.04421);
  animation-delay: -594ms;
}

#particle209 {
  transform: translateX(2.94533vmin) translateY(23.3147vmin) scale(0.32699);
  animation-delay: -1255ms;
}

#particle210 {
  transform: translateX(45.65071vmin) translateY(-14.83282vmin) scale(0.00197);
  animation-delay: -1548ms;
}

#particle211 {
  transform: translateX(-42.93903vmin) translateY(-23.60593vmin) scale(0.00049);
  animation-delay: -1823ms;
}

#particle212 {
  transform: translateX(-35.18909vmin) translateY(11.43363vmin) scale(0.08225);
  animation-delay: -1339ms;
}

#particle213 {
  transform: translateX(-43.91318vmin) translateY(2.76278vmin) scale(0.01771);
  animation-delay: -2146ms;
}

#particle214 {
  transform: translateX(7.95808vmin) translateY(-30.99466vmin) scale(0.15567);
  animation-delay: -1177ms;
}

#particle215 {
  transform: translateX(-3.93501vmin) translateY(-20.62803vmin) scale(0.38709);
  animation-delay: -2439ms;
}

#particle216 {
  transform: translateX(-14.68939vmin) translateY(31.21653vmin) scale(0.11623);
  animation-delay: -951ms;
}

#particle217 {
  transform: translateX(35.22007vmin) translateY(-4.44933vmin) scale(0.10197);
  animation-delay: -2276ms;
}

#particle218 {
  transform: translateX(21.07607vmin) translateY(44.78894vmin) scale(0.00012);
  animation-delay: -1589ms;
}

#particle219 {
  transform: translateX(40.6767vmin) translateY(5.13866vmin) scale(0.03971);
  animation-delay: -1720ms;
}

#particle220 {
  transform: translateX(-39vmin) translateY(0vmin) scale(0.05912);
  animation-delay: -1236ms;
}

#particle221 {
  transform: translateX(-17.39387vmin) translateY(-12.63738vmin) scale(0.37476);
  animation-delay: -1359ms;
}

#particle222 {
  transform: translateX(-26.69756vmin) translateY(-19.39691vmin) scale(0.13926);
  animation-delay: -221ms;
}

#particle223 {
  transform: translateX(-12.56049vmin) translateY(26.6924vmin) scale(0.20032);
  animation-delay: -2031ms;
}

#particle224 {
  transform: translateX(-24.6437vmin) translateY(26.24287vmin) scale(0.09517);
  animation-delay: -196ms;
}

#particle225 {
  transform: translateX(37.09791vmin) translateY(17.45695vmin) scale(0.03971);
  animation-delay: -874ms;
}

#particle226 {
  transform: translateX(-46.97628vmin) translateY(-12.06146vmin) scale(0.00111);
  animation-delay: -2013ms;
}

#particle227 {
  transform: translateX(32.33592vmin) translateY(10.50658vmin) scale(0.12369);
  animation-delay: -53ms;
}

#particle228 {
  transform: translateX(8.83499vmin) translateY(-22.31464vmin) scale(0.31545);
  animation-delay: -391ms;
}

#particle229 {
  transform: translateX(-35.88394vmin) translateY(-22.77264vmin) scale(0.02763);
  animation-delay: -2483ms;
}

#particle230 {
  transform: translateX(-29.52323vmin) translateY(-27.72416vmin) scale(0.04421);
  animation-delay: -1634ms;
}

#particle231 {
  transform: translateX(-19.82559vmin) translateY(31.24013vmin) scale(0.08225);
  animation-delay: -2335ms;
}

#particle232 {
  transform: translateX(2.52965vmin) translateY(13.26088vmin) scale(0.58849);
  animation-delay: -1553ms;
}

#particle233 {
  transform: translateX(-37.99476vmin) translateY(-24.11221vmin) scale(0.01231);
  animation-delay: -217ms;
}

#particle234 {
  transform: translateX(35.28826vmin) translateY(-16.60539vmin) scale(0.05912);
  animation-delay: -1788ms;
}

#particle235 {
  transform: translateX(-18.20288vmin) translateY(-13.22517vmin) scale(0.35055);
  animation-delay: -2268ms;
}

#particle236 {
  transform: translateX(43.37718vmin) translateY(-23.84681vmin) scale(0.00012);
  animation-delay: -477ms;
}

#particle237 {
  transform: translateX(-34.62601vmin) translateY(-32.51599vmin) scale(0.00308);
  animation-delay: -127ms;
}

#particle238 {
  transform: translateX(0vmin) translateY(-44vmin) scale(0.01771);
  animation-delay: -2052ms;
}

#particle239 {
  transform: translateX(-33.35095vmin) translateY(21.16516vmin) scale(0.05391);
  animation-delay: -997ms;
}

#particle240 {
  transform: translateX(16.3925vmin) translateY(-34.83584vmin) scale(0.06456);
  animation-delay: -221ms;
}

#particle241 {
  transform: translateX(-33.97871vmin) translateY(24.68698vmin) scale(0.03142);
  animation-delay: -1082ms;
}

#particle242 {
  transform: translateX(32.76519vmin) translateY(23.8053vmin) scale(0.04421);
  animation-delay: -202ms;
}

#particle243 {
  transform: translateX(15.00315vmin) translateY(23.64118vmin) scale(0.22949);
  animation-delay: -568ms;
}

#particle244 {
  transform: translateX(-26.35506vmin) translateY(28.06529vmin) scale(0.06456);
  animation-delay: -932ms;
}

#particle245 {
  transform: translateX(21.61032vmin) translateY(-4.12239vmin) scale(0.36258);
  animation-delay: -2005ms;
}

#particle246 {
  transform: translateX(39.29149vmin) translateY(-7.49525vmin) scale(0.04894);
  animation-delay: -2005ms;
}

#particle247 {
  transform: translateX(-15.75383vmin) translateY(33.4786vmin) scale(0.08225);
  animation-delay: -2013ms;
}

#particle248 {
  transform: translateX(-16.7393vmin) translateY(7.87692vmin) scale(0.45098);
  animation-delay: -1444ms;
}

#particle249 {
  transform: translateX(-21.45416vmin) translateY(-29.52912vmin) scale(0.0886);
  animation-delay: -424ms;
}

#particle250 {
  transform: translateX(5.95269vmin) translateY(0.752vmin) scale(0.81262);
  animation-delay: -1567ms;
}

#particle251 {
  transform: translateX(16.34272vmin) translateY(25.752vmin) scale(0.18185);
  animation-delay: -2193ms;
}

#particle252 {
  transform: translateX(24.48551vmin) translateY(-15.53898vmin) scale(0.20984);
  animation-delay: -2065ms;
}

#particle253 {
  transform: translateX(5.32666vmin) translateY(-42.16487vmin) scale(0.02763);
  animation-delay: -2442ms;
}

#particle254 {
  transform: translateX(-14.02482vmin) translateY(6.59958vmin) scale(0.53207);
  animation-delay: -2470ms;
}

#particle255 {
  transform: translateX(27.77921vmin) translateY(3.50933vmin) scale(0.22949);
  animation-delay: -926ms;
}

#particle256 {
  transform: translateX(-16.93373vmin) translateY(-42.76972vmin) scale(0.00789);
  animation-delay: -626ms;
}

#particle257 {
  transform: translateX(37.0912vmin) translateY(-12.05166vmin) scale(0.05912);
  animation-delay: -715ms;
}

#particle258 {
  transform: translateX(-40.6767vmin) translateY(5.13866vmin) scale(0.03971);
  animation-delay: -1780ms;
}

#particle259 {
  transform: translateX(-35.83758vmin) translateY(-9.20153vmin) scale(0.08225);
  animation-delay: -2173ms;
}

#particle260 {
  transform: translateX(44.20293vmin) translateY(8.43216vmin) scale(0.01231);
  animation-delay: -1907ms;
}

#particle261 {
  transform: translateX(-9.82325vmin) translateY(38.25903vmin) scale(0.05391);
  animation-delay: -105ms;
}

#particle262 {
  transform: translateX(7.12049vmin) translateY(37.32692vmin) scale(0.07022);
  animation-delay: -279ms;
}

#particle263 {
  transform: translateX(4.78976vmin) translateY(14.74138vmin) scale(0.53207);
  animation-delay: -642ms;
}

#particle264 {
  transform: translateX(-32.51599vmin) translateY(34.62601vmin) scale(0.00308);
  animation-delay: -346ms;
}

#particle265 {
  transform: translateX(30.80462vmin) translateY(-32.80359vmin) scale(0.01231);
  animation-delay: -1018ms;
}

#particle266 {
  transform: translateX(-35.05835vmin) translateY(29.00279vmin) scale(0.00998);
  animation-delay: -1764ms;
}

#particle267 {
  transform: translateX(6.0929vmin) translateY(-23.73029vmin) scale(0.30409);
  animation-delay: -896ms;
}

#particle268 {
  transform: translateX(31.66895vmin) translateY(14.90228vmin) scale(0.10899);
  animation-delay: -41ms;
}

#particle269 {
  transform: translateX(-41.18641vmin) translateY(-22.64242vmin) scale(0.00444);
  animation-delay: -2412ms;
}

#particle270 {
  transform: translateX(-17.58401vmin) translateY(31.98519vmin) scale(0.0886);
  animation-delay: -2256ms;
}

#particle271 {
  transform: translateX(8.61954vmin) translateY(45.18521vmin) scale(0.00789);
  animation-delay: -2091ms;
}

#particle272 {
  transform: translateX(10.49155vmin) translateY(26.49863vmin) scale(0.21957);
  animation-delay: -301ms;
}

#particle273 {
  transform: translateX(39.81239vmin) translateY(18.73429vmin) scale(0.01771);
  animation-delay: -885ms;
}

#particle274 {
  transform: translateX(-4.8541vmin) translateY(-3.52671vmin) scale(0.81262);
  animation-delay: -213ms;
}

#particle275 {
  transform: translateX(-36vmin) translateY(0vmin) scale(0.09517);
  animation-delay: -1698ms;
}

#particle276 {
  transform: translateX(38.83282vmin) translateY(-28.21369vmin) scale(0.00197);
  animation-delay: -1071ms;
}

#particle277 {
  transform: translateX(36.80616vmin) translateY(-9.45022vmin) scale(0.07022);
  animation-delay: -775ms;
}

#particle278 {
  transform: translateX(42.79754vmin) translateY(13.90576vmin) scale(0.01231);
  animation-delay: -1646ms;
}

#particle279 {
  transform: translateX(-2.37764vmin) translateY(-0.77254vmin) scale(0.92154);
  animation-delay: -518ms;
}

#particle280 {
  transform: translateX(29.7778vmin) translateY(-31.71014vmin) scale(0.02078);
  animation-delay: -1685ms;
}

#particle281 {
  transform: translateX(18.95318vmin) translateY(-17.79822vmin) scale(0.27103);
  animation-delay: -603ms;
}

#particle282 {
  transform: translateX(11.92182vmin) translateY(-25.33516vmin) scale(0.22949);
  animation-delay: -1405ms;
}

#particle283 {
  transform: translateX(-31.71014vmin) translateY(-29.7778vmin) scale(0.02078);
  animation-delay: -253ms;
}

#particle284 {
  transform: translateX(12.05166vmin) translateY(-37.0912vmin) scale(0.05912);
  animation-delay: -1666ms;
}

#particle285 {
  transform: translateX(-16.19748vmin) translateY(40.91017vmin) scale(0.01771);
  animation-delay: -1416ms;
}

#particle286 {
  transform: translateX(9.57953vmin) translateY(-29.48275vmin) scale(0.17292);
  animation-delay: -659ms;
}

#particle287 {
  transform: translateX(-5.15299vmin) translateY(27.0129vmin) scale(0.23959);
  animation-delay: -2414ms;
}

#particle288 {
  transform: translateX(-14.4765vmin) translateY(30.76412vmin) scale(0.12369);
  animation-delay: -1644ms;
}

#particle289 {
  transform: translateX(-12.36373vmin) translateY(-4.01722vmin) scale(0.60285);
  animation-delay: -2393ms;
}

#particle290 {
  transform: translateX(-16.6205vmin) translateY(30.23258vmin) scale(0.11623);
  animation-delay: -1093ms;
}

#particle291 {
  transform: translateX(-37.77474vmin) translateY(9.69891vmin) scale(0.05912);
  animation-delay: -2344ms;
}

#particle292 {
  transform: translateX(43.58624vmin) translateY(-11.19104vmin) scale(0.01231);
  animation-delay: -1357ms;
}

#particle293 {
  transform: translateX(17.39387vmin) translateY(12.63738vmin) scale(0.37476);
  animation-delay: -1910ms;
}

#particle294 {
  transform: translateX(-45.09416vmin) translateY(17.85404vmin) scale(0.00111);
  animation-delay: -1545ms;
}

#particle295 {
  transform: translateX(10.87403vmin) translateY(14.96681vmin) scale(0.45098);
  animation-delay: -2024ms;
}

#particle296 {
  transform: translateX(-23.73029vmin) translateY(-6.0929vmin) scale(0.30409);
  animation-delay: -1740ms;
}

#particle297 {
  transform: translateX(31.20579vmin) translateY(25.81567vmin) scale(0.04421);
  animation-delay: -389ms;
}

#particle298 {
  transform: translateX(-30.43527vmin) translateY(-25.17825vmin) scale(0.05391);
  animation-delay: -1145ms;
}

#particle299 {
  transform: translateX(0vmin) translateY(-18.5vmin) scale(0.45098);
  animation-delay: -593ms;
}

#particle300 {
  transform: translateX(-43.22064vmin) translateY(8.24478vmin) scale(0.01771);
  animation-delay: -970ms;
}

#particle301 {
  transform: translateX(-47.12545vmin) translateY(5.95333vmin) scale(0.00308);
  animation-delay: -1153ms;
}

#particle302 {
  transform: translateX(-11.77999vmin) translateY(29.75285vmin) scale(0.15567);
  animation-delay: -401ms;
}

#particle303 {
  transform: translateX(20.44772vmin) translateY(6.64387vmin) scale(0.37476);
  animation-delay: -183ms;
}

#particle304 {
  transform: translateX(-26.59633vmin) translateY(-16.87854vmin) scale(0.16419);
  animation-delay: -518ms;
}

#particle305 {
  transform: translateX(14.25449vmin) translateY(11.79234vmin) scale(0.45098);
  animation-delay: -598ms;
}

#particle306 {
  transform: translateX(-3.85469vmin) translateY(-15.01304vmin) scale(0.53207);
  animation-delay: -983ms;
}

#particle307 {
  transform: translateX(-11.16792vmin) translateY(-15.37132vmin) scale(0.43792);
  animation-delay: -830ms;
}

#particle308 {
  transform: translateX(8.70415vmin) translateY(33.90041vmin) scale(0.10899);
  animation-delay: -885ms;
}

#particle309 {
  transform: translateX(18.40623vmin) translateY(46.48882vmin) scale(0);
  animation-delay: -440ms;
}

#particle310 {
  transform: translateX(1.68614vmin) translateY(-3.06707vmin) scale(0.89027);
  animation-delay: -1816ms;
}

#particle311 {
  transform: translateX(14.24317vmin) translateY(2.71703vmin) scale(0.56006);
  animation-delay: -571ms;
}

#particle312 {
  transform: translateX(-18.22134vmin) translateY(25.07953vmin) scale(0.17292);
  animation-delay: -1174ms;
}

#particle313 {
  transform: translateX(2.95115vmin) translateY(-46.90726vmin) scale(0.00444);
  animation-delay: -1996ms;
}

#particle314 {
  transform: translateX(40.4199vmin) translateY(13.13322vmin) scale(0.02763);
  animation-delay: -1733ms;
}

#particle315 {
  transform: translateX(6.204vmin) translateY(49.10968vmin) scale(0.00012);
  animation-delay: -2229ms;
}

#particle316 {
  transform: translateX(-8.30532vmin) translateY(13.08708vmin) scale(0.53207);
  animation-delay: -2241ms;
}

#particle317 {
  transform: translateX(-34.62601vmin) translateY(-32.51599vmin) scale(0.00308);
  animation-delay: -2247ms;
}

#particle318 {
  transform: translateX(18.30851vmin) translateY(-38.90756vmin) scale(0.02408);
  animation-delay: -1815ms;
}

#particle319 {
  transform: translateX(-26.96796vmin) translateY(-22.30984vmin) scale(0.10899);
  animation-delay: -948ms;
}

#particle320 {
  transform: translateX(15.22545vmin) translateY(2.90441vmin) scale(0.53207);
  animation-delay: -1388ms;
}

#particle321 {
  transform: translateX(28.79426vmin) translateY(-27.03961vmin) scale(0.05391);
  animation-delay: -178ms;
}

#particle322 {
  transform: translateX(-9.98609vmin) translateY(3.24468vmin) scale(0.67608);
  animation-delay: -1628ms;
}

#particle323 {
  transform: translateX(33.93291vmin) translateY(2.13488vmin) scale(0.12369);
  animation-delay: -1985ms;
}

#particle324 {
  transform: translateX(-44.1491vmin) translateY(5.57733vmin) scale(0.01489);
  animation-delay: -1456ms;
}

#particle325 {
  transform: translateX(-8.21457vmin) translateY(8.74762vmin) scale(0.63188);
  animation-delay: -970ms;
}

#particle326 {
  transform: translateX(-35.35329vmin) translateY(9.07718vmin) scale(0.0886);
  animation-delay: -2325ms;
}

#particle327 {
  transform: translateX(31.6623vmin) translateY(-20.0935vmin) scale(0.07612);
  animation-delay: -1940ms;
}

#particle328 {
  transform: translateX(25.48404vmin) translateY(-18.51524vmin) scale(0.16419);
  animation-delay: -2095ms;
}

#particle329 {
  transform: translateX(23.04055vmin) translateY(-36.3061vmin) scale(0.02408);
  animation-delay: -1345ms;
}

#particle330 {
  transform: translateX(-8.82849vmin) translateY(-34.3847vmin) scale(0.10197);
  animation-delay: -1723ms;
}

#particle331 {
  transform: translateX(2.41744vmin) translateY(-38.42403vmin) scale(0.06456);
  animation-delay: -115ms;
}

#particle332 {
  transform: translateX(-34.5vmin) translateY(0vmin) scale(0.11623);
  animation-delay: -57ms;
}

#particle333 {
  transform: translateX(34.28784vmin) translateY(28.36537vmin) scale(0.01489);
  animation-delay: -2002ms;
}

#particle334 {
  transform: translateX(5.76533vmin) translateY(45.63728vmin) scale(0.00789);
  animation-delay: -569ms;
}

#particle335 {
  transform: translateX(24.08768vmin) translateY(-43.81533vmin) scale(0);
  animation-delay: -1981ms;
}

#particle336 {
  transform: translateX(0vmin) translateY(9.5vmin) scale(0.70596);
  animation-delay: -494ms;
}

#particle337 {
  transform: translateX(8.80692vmin) translateY(-46.1675vmin) scale(0.00444);
  animation-delay: -2470ms;
}

#particle338 {
  transform: translateX(-11.15492vmin) translateY(-13.48398vmin) scale(0.4775);
  animation-delay: -2172ms;
}

#particle339 {
  transform: translateX(-20.89725vmin) translateY(32.92879vmin) scale(0.05912);
  animation-delay: -1533ms;
}

#particle340 {
  transform: translateX(-5.24668vmin) translateY(-27.50404vmin) scale(0.22949);
  animation-delay: -1435ms;
}

#particle341 {
  transform: translateX(36.26128vmin) translateY(-14.35686vmin) scale(0.05912);
  animation-delay: -1268ms;
}

#particle342 {
  transform: translateX(31.14689vmin) translateY(33.16807vmin) scale(0.00998);
  animation-delay: -1886ms;
}

#particle343 {
  transform: translateX(34.6731vmin) translateY(28.68408vmin) scale(0.01231);
  animation-delay: -1525ms;
}

#particle344 {
  transform: translateX(-25.86255vmin) translateY(-35.59675vmin) scale(0.01771);
  animation-delay: -329ms;
}

#particle345 {
  transform: translateX(-24.42045vmin) translateY(22.93233vmin) scale(0.13137);
  animation-delay: -428ms;
}

#particle346 {
  transform: translateX(0vmin) translateY(-50vmin) scale(0);
  animation-delay: -7ms;
}

#particle347 {
  transform: translateX(-44.64516vmin) translateY(5.64vmin) scale(0.01231);
  animation-delay: -8ms;
}

#particle348 {
  transform: translateX(32.80359vmin) translateY(30.80462vmin) scale(0.01231);
  animation-delay: -2207ms;
}

#particle349 {
  transform: translateX(-8.60522vmin) translateY(-10.40193vmin) scale(0.58849);
  animation-delay: -1178ms;
}

#particle350 {
  transform: translateX(1.16162vmin) translateY(18.46349vmin) scale(0.45098);
  animation-delay: -569ms;
}

#particle351 {
  transform: translateX(-21.16027vmin) translateY(-29.12461vmin) scale(0.09517);
  animation-delay: -2054ms;
}

#particle352 {
  transform: translateX(23.246vmin) translateY(5.96856vmin) scale(0.31545);
  animation-delay: -1075ms;
}

#particle353 {
  transform: translateX(0vmin) translateY(31.5vmin) scale(0.16419);
  animation-delay: -1967ms;
}

#particle354 {
  transform: translateX(20.33835vmin) translateY(-2.56933vmin) scale(0.39958);
  animation-delay: -1611ms;
}

#particle355 {
  transform: translateX(-35.82887vmin) translateY(-29.64022vmin) scale(0.00604);
  animation-delay: -1206ms;
}

#particle356 {
  transform: translateX(-29.95893vmin) translateY(36.21412vmin) scale(0.00444);
  animation-delay: -1253ms;
}

#particle357 {
  transform: translateX(-28.50899vmin) translateY(23.58469vmin) scale(0.08225);
  animation-delay: -2092ms;
}

#particle358 {
  transform: translateX(-37.2043vmin) translateY(4.7vmin) scale(0.07612);
  animation-delay: -1326ms;
}

#particle359 {
  transform: translateX(-24.39309vmin) translateY(-33.57421vmin) scale(0.03544);
  animation-delay: -2031ms;
}

#particle360 {
  transform: translateX(24.27117vmin) translateY(-20.07886vmin) scale(0.16419);
  animation-delay: -451ms;
}

#particle361 {
  transform: translateX(23.36505vmin) translateY(-42.50087vmin) scale(0.00111);
  animation-delay: -944ms;
}

#particle362 {
  transform: translateX(38.83908vmin) translateY(24.64803vmin) scale(0.00789);
  animation-delay: -2123ms;
}

#particle363 {
  transform: translateX(3.50933vmin) translateY(-27.77921vmin) scale(0.22949);
  animation-delay: -195ms;
}

#particle364 {
  transform: translateX(21.38486vmin) translateY(-8.46686vmin) scale(0.33869);
  animation-delay: -1513ms;
}

#particle365 {
  transform: translateX(-8.61954vmin) translateY(-45.18521vmin) scale(0.00789);
  animation-delay: -1914ms;
}

#particle366 {
  transform: translateX(-7.49525vmin) translateY(39.29149vmin) scale(0.04894);
  animation-delay: -1734ms;
}

#particle367 {
  transform: translateX(7.87002vmin) translateY(-41.25606vmin) scale(0.03142);
  animation-delay: -680ms;
}

#particle368 {
  transform: translateX(24.88274vmin) translateY(11.70893vmin) scale(0.23959);
  animation-delay: -118ms;
}

#particle369 {
  transform: translateX(-30.81797vmin) translateY(19.55768vmin) scale(0.0886);
  animation-delay: -190ms;
}

#particle370 {
  transform: translateX(-12.33217vmin) translateY(31.14751vmin) scale(0.13137);
  animation-delay: -1419ms;
}

#particle371 {
  transform: translateX(34.40173vmin) translateY(13.62061vmin) scale(0.08225);
  animation-delay: -1061ms;
}

#particle372 {
  transform: translateX(45.18521vmin) translateY(8.61954vmin) scale(0.00789);
  animation-delay: -1442ms;
}

#particle373 {
  transform: translateX(-12.36373vmin) translateY(-4.01722vmin) scale(0.60285);
  animation-delay: -1328ms;
}

#particle374 {
  transform: translateX(9.18168vmin) translateY(48.13208vmin) scale(0.00049);
  animation-delay: -408ms;
}

#particle375 {
  transform: translateX(16.46744vmin) translateY(-1.03604vmin) scale(0.50454);
  animation-delay: -1237ms;
}

#particle376 {
  transform: translateX(22.64242vmin) translateY(-41.18641vmin) scale(0.00444);
  animation-delay: -412ms;
}

#particle377 {
  transform: translateX(-17.39387vmin) translateY(12.63738vmin) scale(0.37476);
  animation-delay: -1110ms;
}

#particle378 {
  transform: translateX(-13.57241vmin) translateY(6.38669vmin) scale(0.54601);
  animation-delay: -1140ms;
}

#particle379 {
  transform: translateX(-48.11756vmin) translateY(6.07866vmin) scale(0.00111);
  animation-delay: -1449ms;
}

#particle380 {
  transform: translateX(43.23461vmin) translateY(17.11779vmin) scale(0.00604);
  animation-delay: -1009ms;
}

#particle381 {
  transform: translateX(-5.96856vmin) translateY(-23.246vmin) scale(0.31545);
  animation-delay: -1917ms;
}

#particle382 {
  transform: translateX(48.61362vmin) translateY(6.14133vmin) scale(0.00049);
  animation-delay: -414ms;
}

#particle383 {
  transform: translateX(2.6372vmin) translateY(-41.91712vmin) scale(0.03142);
  animation-delay: -1959ms;
}

#particle384 {
  transform: translateX(-30.99466vmin) translateY(-7.95808vmin) scale(0.15567);
  animation-delay: -354ms;
}

#particle385 {
  transform: translateX(3.84132vmin) translateY(-20.13689vmin) scale(0.39958);
  animation-delay: -2268ms;
}

#particle386 {
  transform: translateX(47.40627vmin) translateY(-2.98255vmin) scale(0.00308);
  animation-delay: -326ms;
}

#particle387 {
  transform: translateX(13.48398vmin) translateY(-11.15492vmin) scale(0.4775);
  animation-delay: -2268ms;
}

#particle388 {
  transform: translateX(-27.40923vmin) translateY(-33.13207vmin) scale(0.02408);
  animation-delay: -1809ms;
}

#particle389 {
  transform: translateX(-2.51162vmin) translateY(-39.92107vmin) scale(0.04894);
  animation-delay: -328ms;
}

#particle390 {
  transform: translateX(21.18911vmin) translateY(-17.52916vmin) scale(0.23959);
  animation-delay: -246ms;
}

#particle391 {
  transform: translateX(2.86841vmin) translateY(-3.46731vmin) scale(0.8591);
  animation-delay: -2289ms;
}

#particle392 {
  transform: translateX(-27.91109vmin) translateY(-20.27859vmin) scale(0.11623);
  animation-delay: -2070ms;
}

#particle393 {
  transform: translateX(3.07066vmin) translateY(-24.30681vmin) scale(0.30409);
  animation-delay: -2259ms;
}

#particle394 {
  transform: translateX(-18.84059vmin) translateY(-10.3577vmin) scale(0.37476);
  animation-delay: -995ms;
}

#particle395 {
  transform: translateX(6.37424vmin) translateY(7.70513vmin) scale(0.69098);
  animation-delay: -1486ms;
}

#particle396 {
  transform: translateX(0vmin) translateY(-44.5vmin) scale(0.01489);
  animation-delay: -979ms;
}

#particle397 {
  transform: translateX(28.50899vmin) translateY(-23.58469vmin) scale(0.08225);
  animation-delay: -1163ms;
}

#particle398 {
  transform: translateX(29.97364vmin) translateY(19.02185vmin) scale(0.10197);
  animation-delay: -603ms;
}

#particle399 {
  transform: translateX(29.09537vmin) translateY(-40.04634vmin) scale(0.00012);
  animation-delay: -572ms;
}

#particle400 {
  transform: translateX(-2.76278vmin) translateY(-43.91318vmin) scale(0.01771);
  animation-delay: -563ms;
}

#particle401 {
  transform: translateX(39.42206vmin) translateY(-2.48023vmin) scale(0.05391);
  animation-delay: -1329ms;
}

#particle402 {
  transform: translateX(26.58271vmin) translateY(21.99113vmin) scale(0.11623);
  animation-delay: -1898ms;
}

#particle403 {
  transform: translateX(9.7553vmin) translateY(24.63908vmin) scale(0.26037);
  animation-delay: -1648ms;
}

#particle404 {
  transform: translateX(-45.55905vmin) translateY(-18.0381vmin) scale(0.00049);
  animation-delay: -1891ms;
}

#particle405 {
  transform: translateX(30.33814vmin) translateY(22.04195vmin) scale(0.07612);
  animation-delay: -2084ms;
}

#particle406 {
  transform: translateX(-27.40923vmin) translateY(33.13207vmin) scale(0.02408);
  animation-delay: -2462ms;
}

#particle407 {
  transform: translateX(14.26585vmin) translateY(-4.63525vmin) scale(0.54601);
  animation-delay: -807ms;
}

#particle408 {
  transform: translateX(10.22754vmin) translateY(4.04937vmin) scale(0.66126);
  animation-delay: -1613ms;
}

#particle409 {
  transform: translateX(16.38154vmin) translateY(41.37505vmin) scale(0.01489);
  animation-delay: -706ms;
}

#particle410 {
  transform: translateX(34.78773vmin) translateY(-25.27477vmin) scale(0.02408);
  animation-delay: -1200ms;
}

#particle411 {
  transform: translateX(26.69756vmin) translateY(-19.39691vmin) scale(0.13926);
  animation-delay: -1927ms;
}

#particle412 {
  transform: translateX(-37.92502vmin) translateY(-2.38604vmin) scale(0.07022);
  animation-delay: -1801ms;
}

#particle413 {
  transform: translateX(-27.86282vmin) translateY(17.68228vmin) scale(0.13926);
  animation-delay: -2364ms;
}

#particle414 {
  transform: translateX(-38.5vmin) translateY(0vmin) scale(0.06456);
  animation-delay: -508ms;
}

#particle415 {
  transform: translateX(13.81295vmin) translateY(-19.0119vmin) scale(0.32699);
  animation-delay: -1714ms;
}

#particle416 {
  transform: translateX(-23.21752vmin) translateY(31.95617vmin) scale(0.05391);
  animation-delay: -469ms;
}

#particle417 {
  transform: translateX(-35.28826vmin) translateY(16.60539vmin) scale(0.05912);
  animation-delay: -1078ms;
}

#particle418 {
  transform: translateX(1.38139vmin) translateY(-21.95659vmin) scale(0.36258);
  animation-delay: -1195ms;
}

#particle419 {
  transform: translateX(-12.51623vmin) translateY(31.6124vmin) scale(0.12369);
  animation-delay: -1221ms;
}

#particle420 {
  transform: translateX(21.30883vmin) translateY(-5.47118vmin) scale(0.36258);
  animation-delay: -1395ms;
}

#particle421 {
  transform: translateX(-7.33635vmin) translateY(28.5732vmin) scale(0.20032);
  animation-delay: -266ms;
}

#particle422 {
  transform: translateX(-5.64vmin) translateY(-44.64516vmin) scale(0.01231);
  animation-delay: -2223ms;
}

#particle423 {
  transform: translateX(19.84171vmin) translateY(12.59193vmin) scale(0.32699);
  animation-delay: -1513ms;
}

#particle424 {
  transform: translateX(-27.40923vmin) translateY(-33.13207vmin) scale(0.02408);
  animation-delay: -282ms;
}

#particle425 {
  transform: translateX(35.19224vmin) translateY(25.56866vmin) scale(0.02078);
  animation-delay: -2217ms;
}

#particle426 {
  transform: translateX(31.71014vmin) translateY(-29.7778vmin) scale(0.02078);
  animation-delay: -2498ms;
}

#particle427 {
  transform: translateX(12.26829vmin) translateY(6.74455vmin) scale(0.57422);
  animation-delay: -2071ms;
}

#particle428 {
  transform: translateX(28.04666vmin) translateY(33.90258vmin) scale(0.01771);
  animation-delay: -41ms;
}

#particle429 {
  transform: translateX(-17.03117vmin) translateY(36.19308vmin) scale(0.04894);
  animation-delay: -1707ms;
}

#particle430 {
  transform: translateX(-37.15043vmin) translateY(-23.57638vmin) scale(0.01771);
  animation-delay: -2316ms;
}

#particle431 {
  transform: translateX(-45.41022vmin) translateY(2.85697vmin) scale(0.00998);
  animation-delay: -549ms;
}

#particle432 {
  transform: translateX(24.68698vmin) translateY(-33.97871vmin) scale(0.03142);
  animation-delay: -2219ms;
}

#particle433 {
  transform: translateX(-31.6124vmin) translateY(12.51623vmin) scale(0.12369);
  animation-delay: -1625ms;
}

#particle434 {
  transform: translateX(-8.18895vmin) translateY(25.203vmin) scale(0.26037);
  animation-delay: -1276ms;
}

#particle435 {
  transform: translateX(8.61954vmin) translateY(45.18521vmin) scale(0.00789);
  animation-delay: -1096ms;
}

#particle436 {
  transform: translateX(-20.62933vmin) translateY(32.50663vmin) scale(0.06456);
  animation-delay: -2130ms;
}

#particle437 {
  transform: translateX(35.71613vmin) translateY(-4.512vmin) scale(0.09517);
  animation-delay: -1011ms;
}

#particle438 {
  transform: translateX(19.58585vmin) translateY(-41.62204vmin) scale(0.00789);
  animation-delay: -229ms;
}

#particle439 {
  transform: translateX(3.75079vmin) translateY(-5.9103vmin) scale(0.78186);
  animation-delay: -1251ms;
}

#particle440 {
  transform: translateX(6.14133vmin) translateY(48.61362vmin) scale(0.00049);
  animation-delay: -545ms;
}

#particle441 {
  transform: translateX(-42.32201vmin) translateY(13.75126vmin) scale(0.01489);
  animation-delay: -958ms;
}

#particle442 {
  transform: translateX(-22.33584vmin) translateY(-30.74265vmin) scale(0.07022);
  animation-delay: -250ms;
}

#particle443 {
  transform: translateX(-2.38604vmin) translateY(-37.92502vmin) scale(0.07022);
  animation-delay: -1192ms;
}

#particle444 {
  transform: translateX(12.66492vmin) translateY(8.0374vmin) scale(0.54601);
  animation-delay: -297ms;
}

#particle445 {
  transform: translateX(6.27727vmin) translateY(-32.90662vmin) scale(0.13137);
  animation-delay: -21ms;
}

#particle446 {
  transform: translateX(26.44771vmin) translateY(1.66395vmin) scale(0.26037);
  animation-delay: -2366ms;
}

#particle447 {
  transform: translateX(-23.88591vmin) translateY(-19.76014vmin) scale(0.17292);
  animation-delay: -1064ms;
}

#particle448 {
  transform: translateX(-13.62494vmin) translateY(-28.95447vmin) scale(0.15567);
  animation-delay: -770ms;
}

#particle449 {
  transform: translateX(10.58013vmin) translateY(-14.56231vmin) scale(0.46417);
  animation-delay: -1239ms;
}

#particle450 {
  transform: translateX(-5.76533vmin) translateY(-45.63728vmin) scale(0.00789);
  animation-delay: -658ms;
}

#particle451 {
  transform: translateX(29.38926vmin) translateY(-40.45085vmin) scale(0);
  animation-delay: -1117ms;
}

#particle452 {
  transform: translateX(-32.50663vmin) translateY(20.62933vmin) scale(0.06456);
  animation-delay: -1539ms;
}

#particle453 {
  transform: translateX(0.56214vmin) translateY(2.94686vmin) scale(0.90589);
  animation-delay: -456ms;
}

#particle454 {
  transform: translateX(-20.01163vmin) translateY(42.52687vmin) scale(0.00444);
  animation-delay: -655ms;
}

#particle455 {
  transform: translateX(-4.30977vmin) translateY(22.59261vmin) scale(0.33869);
  animation-delay: -131ms;
}

#particle456 {
  transform: translateX(13.5vmin) translateY(0vmin) scale(0.58849);
  animation-delay: -1764ms;
}

#particle457 {
  transform: translateX(25.04168vmin) translateY(-20.71628vmin) scale(0.14736);
  animation-delay: -442ms;
}

#particle458 {
  transform: translateX(-30.43527vmin) translateY(-25.17825vmin) scale(0.05391);
  animation-delay: -609ms;
}

#particle459 {
  transform: translateX(-20.03334vmin) translateY(16.57302vmin) scale(0.27103);
  animation-delay: -2091ms;
}

#particle460 {
  transform: translateX(37.65595vmin) translateY(14.90904vmin) scale(0.04421);
  animation-delay: -1979ms;
}

#particle461 {
  transform: translateX(26.13438vmin) translateY(31.59104vmin) scale(0.03971);
  animation-delay: -1128ms;
}

#particle462 {
  transform: translateX(-20.36142vmin) translateY(32.08446vmin) scale(0.07022);
  animation-delay: -175ms;
}

#particle463 {
  transform: translateX(-21.74805vmin) translateY(29.93363vmin) scale(0.08225);
  animation-delay: -2221ms;
}

#particle464 {
  transform: translateX(-11.56408vmin) translateY(45.03912vmin) scale(0.00604);
  animation-delay: -2239ms;
}

#particle465 {
  transform: translateX(4.5vmin) translateY(0vmin) scale(0.8591);
  animation-delay: -1540ms;
}

#particle466 {
  transform: translateX(-20.33835vmin) translateY(-2.56933vmin) scale(0.39958);
  animation-delay: -1679ms;
}

#particle467 {
  transform: translateX(39.18853vmin) translateY(4.95066vmin) scale(0.05391);
  animation-delay: -1984ms;
}

#particle468 {
  transform: translateX(-12.7003vmin) translateY(32.07729vmin) scale(0.11623);
  animation-delay: -1082ms;
}

#particle469 {
  transform: translateX(-4.76266vmin) translateY(-37.70036vmin) scale(0.07022);
  animation-delay: -197ms;
}

#particle470 {
  transform: translateX(-27.03961vmin) translateY(-28.79426vmin) scale(0.05391);
  animation-delay: -1043ms;
}

#particle471 {
  transform: translateX(34.43192vmin) translateY(2.16627vmin) scale(0.11623);
  animation-delay: -1395ms;
}

#particle472 {
  transform: translateX(22.78397vmin) translateY(-12.5256vmin) scale(0.27103);
  animation-delay: -2302ms;
}

#particle473 {
  transform: translateX(40.9499vmin) translateY(25.9876vmin) scale(0.00111);
  animation-delay: -682ms;
}

#particle474 {
  transform: translateX(-36.80488vmin) translateY(-20.23365vmin) scale(0.03142);
  animation-delay: -120ms;
}

#particle475 {
  transform: translateX(32.44754vmin) translateY(-8.33111vmin) scale(0.13137);
  animation-delay: -1111ms;
}

#particle476 {
  transform: translateX(12.34349vmin) translateY(16.98936vmin) scale(0.38709);
  animation-delay: -338ms;
}

#particle477 {
  transform: translateX(21.26344vmin) translateY(10.00581vmin) scale(0.32699);
  animation-delay: -2396ms;
}

#particle478 {
  transform: translateX(-14.98732vmin) translateY(-46.12624vmin) scale(0.00111);
  animation-delay: -436ms;
}

#particle479 {
  transform: translateX(-13.24823vmin) translateY(24.09843vmin) scale(0.23959);
  animation-delay: -976ms;
}

#particle480 {
  transform: translateX(-32.93488vmin) translateY(-2.07209vmin) scale(0.13926);
  animation-delay: -1652ms;
}

#particle481 {
  transform: translateX(10.12343vmin) translateY(25.56885vmin) scale(0.23959);
  animation-delay: -1891ms;
}

#particle482 {
  transform: translateX(-0.68933vmin) translateY(-5.45663vmin) scale(0.82807);
  animation-delay: -1539ms;
}

#particle483 {
  transform: translateX(-17.91879vmin) translateY(-4.60076vmin) scale(0.45098);
  animation-delay: -1757ms;
}

#particle484 {
  transform: translateX(-2.60581vmin) translateY(-41.41811vmin) scale(0.03544);
  animation-delay: -1072ms;
}

#particle485 {
  transform: translateX(-16.6205vmin) translateY(-30.23258vmin) scale(0.11623);
  animation-delay: -1258ms;
}

#particle486 {
  transform: translateX(20.53641vmin) translateY(-21.86906vmin) scale(0.19098);
  animation-delay: -54ms;
}

#particle487 {
  transform: translateX(-14.21478vmin) translateY(-43.7486vmin) scale(0.00789);
  animation-delay: -313ms;
}

#particle488 {
  transform: translateX(-43.15699vmin) translateY(-5.452vmin) scale(0.02078);
  animation-delay: -748ms;
}

#particle489 {
  transform: translateX(1.44133vmin) translateY(11.40932vmin) scale(0.64653);
  animation-delay: -2324ms;
}

#particle490 {
  transform: translateX(2.73139vmin) translateY(43.41416vmin) scale(0.02078);
  animation-delay: -917ms;
}

#particle491 {
  transform: translateX(11.43363vmin) translateY(35.18909vmin) scale(0.08225);
  animation-delay: -849ms;
}

#particle492 {
  transform: translateX(-1.85232vmin) translateY(29.44179vmin) scale(0.20032);
  animation-delay: -1107ms;
}

#particle493 {
  transform: translateX(19.7169vmin) translateY(-10.83946vmin) scale(0.35055);
  animation-delay: -2032ms;
}

#particle494 {
  transform: translateX(25.94869vmin) translateY(1.63255vmin) scale(0.27103);
  animation-delay: -1283ms;
}

#particle495 {
  transform: translateX(8.30532vmin) translateY(13.08708vmin) scale(0.53207);
  animation-delay: -2302ms;
}

#particle496 {
  transform: translateX(28.75098vmin) translateY(-30.61668vmin) scale(0.03142);
  animation-delay: -188ms;
}

#particle497 {
  transform: translateX(22.93233vmin) translateY(24.42045vmin) scale(0.13137);
  animation-delay: -123ms;
}

#particle498 {
  transform: translateX(-20.13689vmin) translateY(3.84132vmin) scale(0.39958);
  animation-delay: -1026ms;
}

#particle499 {
  transform: translateX(-31.43784vmin) translateY(-1.9779vmin) scale(0.16419);
  animation-delay: -2255ms;
}

#particle500 {
  transform: translateX(31.6124vmin) translateY(-12.51623vmin) scale(0.12369);
  animation-delay: -186ms;
}

#particle501 {
  transform: translateX(18.73429vmin) translateY(39.81239vmin) scale(0.01771);
  animation-delay: -8ms;
}

#particle502 {
  transform: translateX(11.31539vmin) translateY(44.07053vmin) scale(0.00998);
  animation-delay: -946ms;
}

#particle503 {
  transform: translateX(-27.33201vmin) translateY(37.61929vmin) scale(0.00604);
  animation-delay: -2222ms;
}

#particle504 {
  transform: translateX(6.9448vmin) translateY(-0.87733vmin) scale(0.78186);
  animation-delay: -106ms;
}

#particle505 {
  transform: translateX(-34.86899vmin) translateY(-8.95284vmin) scale(0.09517);
  animation-delay: -833ms;
}

#particle506 {
  transform: translateX(-15.65699vmin) translateY(28.47997vmin) scale(0.14736);
  animation-delay: -2452ms;
}

#particle507 {
  transform: translateX(17.66575vmin) translateY(6.99437vmin) scale(0.43792);
  animation-delay: -1673ms;
}

#particle508 {
  transform: translateX(44.5vmin) translateY(0vmin) scale(0.01489);
  animation-delay: -1067ms;
}

#particle509 {
  transform: translateX(-21.86906vmin) translateY(-20.53641vmin) scale(0.19098);
  animation-delay: -850ms;
}

#particle510 {
  transform: translateX(28.97747vmin) translateY(-5.52775vmin) scale(0.20032);
  animation-delay: -2188ms;
}

#particle511 {
  transform: translateX(-27.10207vmin) translateY(-19.69081vmin) scale(0.13137);
  animation-delay: -804ms;
}

#particle512 {
  transform: translateX(-10.94236vmin) translateY(-42.61766vmin) scale(0.01771);
  animation-delay: -591ms;
}

#particle513 {
  transform: translateX(-46.60177vmin) translateY(15.14183vmin) scale(0.00049);
  animation-delay: -245ms;
}

#particle514 {
  transform: translateX(16.03731vmin) translateY(-15.06004vmin) scale(0.36258);
  animation-delay: -1390ms;
}

#particle515 {
  transform: translateX(14.37549vmin) translateY(15.30834vmin) scale(0.38709);
  animation-delay: -1517ms;
}

#particle516 {
  transform: translateX(-13.31479vmin) translateY(4.32624vmin) scale(0.57422);
  animation-delay: -1901ms;
}

#particle517 {
  transform: translateX(11.80297vmin) translateY(21.46951vmin) scale(0.30409);
  animation-delay: -2284ms;
}

#particle518 {
  transform: translateX(8.20677vmin) translateY(31.96324vmin) scale(0.13926);
  animation-delay: -558ms;
}

#particle519 {
  transform: translateX(7.53002vmin) translateY(8.01865vmin) scale(0.66126);
  animation-delay: -1421ms;
}

#particle520 {
  transform: translateX(37.70036vmin) translateY(-4.76266vmin) scale(0.07022);
  animation-delay: -953ms;
}

#particle521 {
  transform: translateX(15.14183vmin) translateY(-46.60177vmin) scale(0.00049);
  animation-delay: -2165ms;
}

#particle522 {
  transform: translateX(30.31171vmin) translateY(-14.26361vmin) scale(0.13137);
  animation-delay: -2032ms;
}

#particle523 {
  transform: translateX(-39.98039vmin) translateY(15.82936vmin) scale(0.02408);
  animation-delay: -2175ms;
}

#particle524 {
  transform: translateX(29.2795vmin) translateY(24.22211vmin) scale(0.07022);
  animation-delay: -1522ms;
}

#particle525 {
  transform: translateX(46.0077vmin) translateY(11.81277vmin) scale(0.00308);
  animation-delay: -819ms;
}

#particle526 {
  transform: translateX(29.64022vmin) translateY(-35.82887vmin) scale(0.00604);
  animation-delay: -617ms;
}

#particle527 {
  transform: translateX(33.13207vmin) translateY(27.40923vmin) scale(0.02408);
  animation-delay: -139ms;
}

#particle528 {
  transform: translateX(-8.5798vmin) translateY(33.41612vmin) scale(0.11623);
  animation-delay: -469ms;
}

#particle529 {
  transform: translateX(5.13866vmin) translateY(-40.6767vmin) scale(0.03971);
  animation-delay: -2364ms;
}

#particle530 {
  transform: translateX(-23.26598vmin) translateY(28.12373vmin) scale(0.0886);
  animation-delay: -1412ms;
}

#particle531 {
  transform: translateX(17.04577vmin) translateY(23.46149vmin) scale(0.20984);
  animation-delay: -2413ms;
}

#particle532 {
  transform: translateX(3.88533vmin) translateY(30.75556vmin) scale(0.17292);
  animation-delay: -1223ms;
}

#particle533 {
  transform: translateX(3.948vmin) translateY(-31.25161vmin) scale(0.16419);
  animation-delay: -592ms;
}

#particle534 {
  transform: translateX(-13.48398vmin) translateY(11.15492vmin) scale(0.4775);
  animation-delay: -2346ms;
}

#particle535 {
  transform: translateX(-40.04634vmin) translateY(-29.09537vmin) scale(0.00012);
  animation-delay: -2040ms;
}

#particle536 {
  transform: translateX(-12.0496vmin) translateY(-16.58485vmin) scale(0.39958);
  animation-delay: -372ms;
}

#particle537 {
  transform: translateX(-42.61766vmin) translateY(10.94236vmin) scale(0.01771);
  animation-delay: -214ms;
}

#particle538 {
  transform: translateX(-14.36929vmin) translateY(44.22413vmin) scale(0.00604);
  animation-delay: -247ms;
}

#particle539 {
  transform: translateX(31.55249vmin) translateY(-38.14041vmin) scale(0.00012);
  animation-delay: -409ms;
}

#particle540 {
  transform: translateX(-3.56024vmin) translateY(18.66346vmin) scale(0.43792);
  animation-delay: -1512ms;
}

#particle541 {
  transform: translateX(33.20053vmin) translateY(-35.35498vmin) scale(0.00111);
  animation-delay: -563ms;
}

#particle542 {
  transform: translateX(6.87664vmin) translateY(-4.99617vmin) scale(0.73613);
  animation-delay: -1222ms;
}

#particle543 {
  transform: translateX(27.99519vmin) translateY(5.34037vmin) scale(0.21957);
  animation-delay: -701ms;
}

#particle544 {
  transform: translateX(-20.86638vmin) translateY(-28.7201vmin) scale(0.10197);
  animation-delay: -1548ms;
}

#particle545 {
  transform: translateX(-31.66895vmin) translateY(14.90228vmin) scale(0.10899);
  animation-delay: -373ms;
}

#particle546 {
  transform: translateX(18.5vmin) translateY(0vmin) scale(0.45098);
  animation-delay: -2071ms;
}

#particle547 {
  transform: translateX(-36.81027vmin) translateY(-26.74423vmin) scale(0.00998);
  animation-delay: -2116ms;
}

#particle548 {
  transform: translateX(-17.49525vmin) translateY(-16.42913vmin) scale(0.31545);
  animation-delay: -1873ms;
}

#particle549 {
  transform: translateX(-24.64803vmin) translateY(38.83908vmin) scale(0.00789);
  animation-delay: -608ms;
}

#particle550 {
  transform: translateX(-30.23258vmin) translateY(16.6205vmin) scale(0.11623);
  animation-delay: -2400ms;
}

#particle551 {
  transform: translateX(17.11779vmin) translateY(-43.23461vmin) scale(0.00604);
  animation-delay: -1259ms;
}

#particle552 {
  transform: translateX(8.43297vmin) translateY(-1.06533vmin) scale(0.73613);
  animation-delay: -1686ms;
}

#particle553 {
  transform: translateX(-21.70099vmin) translateY(-34.19528vmin) scale(0.04421);
  animation-delay: -1395ms;
}

#particle554 {
  transform: translateX(14.63975vmin) translateY(12.11106vmin) scale(0.43792);
  animation-delay: -2119ms;
}

#particle555 {
  transform: translateX(-33.02619vmin) translateY(15.54094vmin) scale(0.0886);
  animation-delay: -2003ms;
}

#particle556 {
  transform: translateX(33.02619vmin) translateY(-15.54094vmin) scale(0.0886);
  animation-delay: -209ms;
}

#particle557 {
  transform: translateX(-10.20556vmin) translateY(-9.58366vmin) scale(0.57422);
  animation-delay: -557ms;
}

#particle558 {
  transform: translateX(-19.52531vmin) translateY(-7.73062vmin) scale(0.38709);
  animation-delay: -2011ms;
}

#particle559 {
  transform: translateX(18.51524vmin) translateY(-25.48404vmin) scale(0.16419);
  animation-delay: -1709ms;
}

#particle560 {
  transform: translateX(4.77822vmin) translateY(-25.04832vmin) scale(0.28187);
  animation-delay: -640ms;
}

#particle561 {
  transform: translateX(-21.22096vmin) translateY(-22.59803vmin) scale(0.17292);
  animation-delay: -909ms;
}

#particle562 {
  transform: translateX(0vmin) translateY(29.5vmin) scale(0.20032);
  animation-delay: -1071ms;
}

#particle563 {
  transform: translateX(-23.73029vmin) translateY(-6.0929vmin) scale(0.30409);
  animation-delay: -1196ms;
}

#particle564 {
  transform: translateX(-34.62601vmin) translateY(-32.51599vmin) scale(0.00308);
  animation-delay: -922ms;
}

#particle565 {
  transform: translateX(11.49604vmin) translateY(24.43033vmin) scale(0.24989);
  animation-delay: -796ms;
}

#particle566 {
  transform: translateX(-7.96371vmin) translateY(41.74721vmin) scale(0.02763);
  animation-delay: -1474ms;
}

#particle567 {
  transform: translateX(-15.62007vmin) translateY(-9.9128vmin) scale(0.45098);
  animation-delay: -221ms;
}

#particle568 {
  transform: translateX(-14.25449vmin) translateY(-11.79234vmin) scale(0.45098);
  animation-delay: -796ms;
}

#particle569 {
  transform: translateX(0.84322vmin) translateY(4.42029vmin) scale(0.8591);
  animation-delay: -1469ms;
}

#particle570 {
  transform: translateX(5.51466vmin) translateY(-43.65305vmin) scale(0.01771);
  animation-delay: -667ms;
}

#particle571 {
  transform: translateX(25.78757vmin) translateY(-12.13471vmin) scale(0.21957);
  animation-delay: -2068ms;
}

#particle572 {
  transform: translateX(37.57259vmin) translateY(-23.84429vmin) scale(0.01489);
  animation-delay: -1669ms;
}

#particle573 {
  transform: translateX(28.04964vmin) translateY(13.19916vmin) scale(0.17292);
  animation-delay: -849ms;
}

#particle574 {
  transform: translateX(15.61689vmin) translateY(-18.87757vmin) scale(0.30409);
  animation-delay: -1813ms;
}

#particle575 {
  transform: translateX(-34.38005vmin) translateY(-6.55835vmin) scale(0.10899);
  animation-delay: -2387ms;
}

#particle576 {
  transform: translateX(-38.11934vmin) translateY(-20.95628vmin) scale(0.02078);
  animation-delay: -1315ms;
}

#particle577 {
  transform: translateX(-4.47068vmin) translateY(9.50068vmin) scale(0.67608);
  animation-delay: -1520ms;
}

#particle578 {
  transform: translateX(-1.22442vmin) translateY(19.46152vmin) scale(0.42499);
  animation-delay: -1962ms;
}

#particle579 {
  transform: translateX(38.3092vmin) translateY(7.30787vmin) scale(0.05912);
  animation-delay: -1589ms;
}

#particle580 {
  transform: translateX(44.69407vmin) translateY(-8.52585vmin) scale(0.00998);
  animation-delay: -1574ms;
}

#particle581 {
  transform: translateX(-34.62601vmin) translateY(32.51599vmin) scale(0.00308);
  animation-delay: -1907ms;
}

#particle582 {
  transform: translateX(-13.56016vmin) translateY(3.48166vmin) scale(0.57422);
  animation-delay: -1349ms;
}

#particle583 {
  transform: translateX(28.82307vmin) translateY(11.41186vmin) scale(0.17292);
  animation-delay: -1080ms;
}

#particle584 {
  transform: translateX(30.91506vmin) translateY(-37.36989vmin) scale(0.00111);
  animation-delay: -1697ms;
}

#particle585 {
  transform: translateX(27.33201vmin) translateY(37.61929vmin) scale(0.00604);
  animation-delay: -1705ms;
}

#particle586 {
  transform: translateX(-49.11436vmin) translateY(-9.36907vmin) scale(0);
  animation-delay: -1588ms;
}

#particle587 {
  transform: translateX(23.46149vmin) translateY(17.04577vmin) scale(0.20984);
  animation-delay: -528ms;
}

#particle588 {
  transform: translateX(-28.50899vmin) translateY(23.58469vmin) scale(0.08225);
  animation-delay: -2255ms;
}

#particle589 {
  transform: translateX(-44.62927vmin) translateY(-17.66998vmin) scale(0.00197);
  animation-delay: -1387ms;
}

#particle590 {
  transform: translateX(-21.71585vmin) translateY(10.2187vmin) scale(0.31545);
  animation-delay: -366ms;
}

#particle591 {
  transform: translateX(-41.16963vmin) translateY(19.37296vmin) scale(0.00998);
  animation-delay: -381ms;
}

#particle592 {
  transform: translateX(3.09179vmin) translateY(16.20774vmin) scale(0.50454);
  animation-delay: -1691ms;
}

#particle593 {
  transform: translateX(23.58469vmin) translateY(28.50899vmin) scale(0.08225);
  animation-delay: -1559ms;
}

#particle594 {
  transform: translateX(19.58585vmin) translateY(41.62204vmin) scale(0.00789);
  animation-delay: -1491ms;
}

#particle595 {
  transform: translateX(-32.41548vmin) translateY(6.18358vmin) scale(0.13926);
  animation-delay: -1004ms;
}

#particle596 {
  transform: translateX(28.77133vmin) translateY(-3.63466vmin) scale(0.20984);
  animation-delay: -180ms;
}

#particle597 {
  transform: translateX(-7.72542vmin) translateY(-23.77641vmin) scale(0.29289);
  animation-delay: -2120ms;
}

#particle598 {
  transform: translateX(-31.74767vmin) translateY(-4.01066vmin) scale(0.15567);
  animation-delay: -841ms;
}

#particle599 {
  transform: translateX(-12.13471vmin) translateY(-25.78757vmin) scale(0.21957);
  animation-delay: -1664ms;
}

#particle600 {
  transform: translateX(-35.42995vmin) translateY(2.22906vmin) scale(0.10197);
  animation-delay: -1735ms;
}

@keyframes doit {
  0% {
    opacity: 0;
  }
  5% {
    opacity: 1;
  }
  100% {
    opacity: 1;
    transform: translateX(0) translateY(0) scale(0.1);
  }
}


</style>
