<?php
function zonaMunicipio(){
	$dados = printf('
		<option value="TODAS">TODAS</option>
		<option value="ANGRA DOS REIS">ANGRA DOS REIS</option>
		<option value="ARMAÇÃO DOS BÚZIOS">ARMAÇÃO DOS BÚZIOS</option>
		<option value="ARARUAMA">ARARUAMA</option>
		<option value="ARRAIAL DO CABO">ARRAIAL DO CABO</option>
		<option value="BARRA DO PIRAÍ">BARRA DO PIRAÍ</option>
		<option value="BARRA MANSA">BARRA MANSA</option>
		<option value="BELDFORD ROXO">BELDFORD ROXO</option>
		<option value="BOM JARDIM">BOM JARDIM</option>
		<option value="BOM JESUS DO ITABAPOANA">BOM JESUS DO ITABAPOANA</option>
		<option value="CABO FRIO">CABO FRIO</option>
		<option value="CACHOEIRAS DE MACACU">CACHOEIRAS DE MACACU</option>
		<option value="CAMBUCI">CAMBUCI</option>
		<option value="CAMPOS DOS GOYTACAZES">CAMPOS DOS GOYTACAZES</option>
		<option value="CANTAGALO">CANTAGALO</option>
		<option value="CARMO">CARMO</option>
		<option value="CASIMIRO DE ABREU">CASIMIRO DE ABREU</option>
		<option value="CORDEIRO">CORDEIRO</option>
		<option value="DUQUE DE CAXIAS">DUQUE DE CAXIAS</option>
		<option value="GUAPIMIRIM">GUAPIMIRIM</option>
		<option value="IGUABA GRANDE">IGUABA GRANDE</option>
		<option value="ITABORAI">ITABORAI</option>
		<option value="ITALVA">ITALVA</option>
		<option value="ITAPERUNA">ITAPERUNA</option>
		<option value="MACAÉ">MACAÉ</option>
		<option value="MAGÉ">MAGÉ</option>
		<option value="MANGARATIBA">MANGARATIBA</option>
		<option value="MARICÁ">MARICÁ</option>
		<option value="MENDES">MENDES</option>
		<option value="MESQUITA">MESQUITA</option>
		<option value="MIGUEL PEREIRA">MIGUEL PEREIRA</option>
		<option value="MIRACEMA">MIRACEMA</option>
		<option value="NATIVIDADE">NATIVIDADE</option>
		<option value="NILOPOLIS">NILOPOLIS</option>
		<option value="NITEROI">NITEROI</option>
		<option value="NOVA FRIBURGO">NOVA FRIBURGO</option>
		<option value="NOVA IGUAÇU">NOVA IGUAÇU</option>
		<option value="PARAÍBA DO SUL">PARAÍBA DO SUL</option>
		<option value="PETRÓPOLIS">PETRÓPOLIS</option>
		<option value="PIRAÍ">PIRAÍ</option>
		<option value="PORTO REAL">PORTO REAL</option>
		<option value="QUEIMADOS">QUEIMADOS</option>
		<option value="QUISSAMÃ">QUISSAMÃ</option>
		<option value="RESENDE">RESENDE</option>
		<option value="RIO BONITO">RIO BONITO</option>
		<option value="RIO DAS OSTRAS">RIO DAS OSTRAS</option>
		<option value="RIO DE JANEIRO">RIO DE JANEIRO</option>
		<option value="SANTA MARIA MADALENA">SANTA MARIA MADALENA</option>
		<option value="SANTO ANTÔNIO DE PÁDUA">SANTO ANTÔNIO DE PÁDUA</option>
		<option value="SÃO FIDÉLIS">SÃO FIDÉLIS</option>
		<option value="SÃO JOSÉ DO VALE DO RIO PRETO">SÃO JOSÉ DO VALE DO RIO PRETO</option>
		<option value="SÃO PEDRO DA ALDEIA">SÃO PEDRO DA ALDEIA</option>
		<option value="SÃO SEBASTIÃO DO ALTO">SÃO SEBASTIÃO DO ALTO</option>
		<option value="SAO JOAO DE MERITI">SAO JOAO DE MERITI</option>
		<option value="SAPUCAIA">SAPUCAIA</option>
		<option value="SEROPEDICA">SEROPEDICA</option>
		<option value="SILVA JARDIM">SILVA JARDIM</option>
		<option value="SUMIDOURO">SUMIDOURO</option>
		<option value="TERESÓPOLIS">TERESÓPOLIS</option>
		<option value="TRAJANO DE MORAES">TRAJANO DE MORAES</option>
		<option value="TRES RIOS">TRES RIOS</option>
		<option value="VALENÇA">VALENÇA</option>
		<option value="VASSOURAS">VASSOURAS</option>
		<option value="VOLTA REDONDA">VOLTA REDONDA</option>
		<option value="ZE GAROTO">SÃO GONÇALO</option>
		');
	return $dados;
}

function zonaBairro(){
	$dados = printf('
		<option value="TODAS">TODAS</option>
		<option value="25 DE AGOSTO">DUQUE DE CAXIAS</option>
		<option value="ATERRADO">VOLTA REDONDA</option>
		<option value="BARRA DA TIJUCA">RIO DE JANEIRO</option>
		<option value="BAIRRO DA LUZ">NOVA IGUAÇU</option>
		<option value="BANANAL">GUAPIMIRIM</option>
		<option value="BANGU">RIO DE JANEIRO</option>
		<option value="BARBARÁ">BARRA MANSA</option>
		<option value="BETEL">CACHOEIRAS DE MACACU</option>
		<option value="BOSQUE DA PRAIA">RIO DAS OSTRAS</option>
		<option value="CAMPO GRANDE">RIO DE JANEIRO</option>
		<option value="CASCADURA">RIO DE JANEIRO</option>
		<option value="CENTRO">ARMAÇÃO DOS BÚZIOS</option>
		<option value="CENTRO">BELDFORD ROXO</option>
		<option value="CENTRO">BOM JARDIM</option>
		<option value="CENTRO">BOM JESUS DO ITABAPOANA</option>
		<option value="CENTRO">CABO FRIO</option>
		<option value="CENTRO">CAMBUCI</option>
		<option value="CENTRO">CAMPOS DOS GOYTACAZES</option>
		<option value="CENTRO">CANTAGALO</option>
		<option value="CENTRO">CARMO</option>
		<option value="CENTRO">CORDEIRO</option>
		<option value="CENTRO">ITABORAI</option>
		<option value="CENTRO">MACAÉ</option>
		<option value="CENTRO">MAGÉ</option>
		<option value="CENTRO">MENDES</option>
		<option value="CENTRO">MESQUITA</option>
		<option value="CENTRO">MIGUEL PEREIRA</option>
		<option value="CENTRO">MIRACEMA</option>
		<option value="CENTRO">NATIVIDADE</option>
		<option value="CENTRO">NILOPOLIS</option>
		<option value="CENTRO">NITEROI</option>
		<option value="CENTRO">NOVA FRIBURGO</option>
		<option value="CENTRO">NOVA IGUAÇU</option>
		<option value="CENTRO">PARAÍBA DO SUL</option>
		<option value="CENTRO">PETRÓPOLIS</option>
		<option value="CENTRO">PIRAÍ</option>
		<option value="CENTRO">PORTO REAL</option>
		<option value="CENTRO">RESENDE</option>
		<option value="CENTRO">SANTA MARIA MADALENA</option>
		<option value="CENTRO">SÃO FIDÉLIS</option>
		<option value="CENTRO">SÃO JOSÉ DO VALE DO RIO PRETO</option>
		<option value="CENTRO">SÃO SEBASTIÃO DO ALTO</option>
		<option value="CENTRO">SAPUCAIA</option>
		<option value="CENTRO">SILVA JARDIM</option>
		<option value="CENTRO">SUMIDOURO</option>
		<option value="CENTRO">TRAJANO DE MORAES</option>
		<option value="CENTRO">VALENÇA</option>
		<option value="CENTRO">VASSOURAS</option>
		<option value="CENTRO">SÃO GONÇALO</option>
		<option value="COPACABANA">RIO DE JANEIRO</option>
		<option value="DEL CASTILHO">RIO DE JANEIRO</option>
		<option value="DEODORO">RIO DE JANEIRO</option>
		<option value="DEZESSETE">SANTO ANTÔNIO DE PÁDUA</option>
		<option value="FLAMENGO">MARICÁ</option>
		<option value="FANCHEM">QUEIMADOS</option>
		<option value="GREEN VALLEY">RIO BONITO</option>
		<option value="GUADALUPE">RIO DE JANEIRO</option>
		<option value="ILHA DO GOVERNADOR">RIO DE JANEIRO</option>
		<option value="IRAJÁ">RIO DE JANEIRO</option>
		<option value="ITAIPAVA">PETRÓPOLIS</option>
		<option value="ITINGA">SÃO PEDRO DA ALDEIA</option>
		<option value="JARDIM BOTANICO">RIO DE JANEIRO</option>
		<option value="JARDIM SAO JORGE">SEROPEDICA</option>
		<option value="LARANJEIRAS">RIO DE JANEIRO</option>
		<option value="MARACANÃ>RIO DE JANEIRO</option>
		<option value="MARECHAL HERMES">RIO DE JANEIRO</option>
		<option value="MATADOURO">BARRA DO PIRAÍ</option>
		<option value="MÉIER">RIO DE JANEIRO</option>
		<option value="NOVA NITERÓI">TRES RIOS</option>
		<option value="NEVES">SÃO GONÇALO</option>
		<option value="OLARIA">RIO DE JANEIRO</option>
		<option value="PRAIA DOS ANJOS">ARRAIAL DO CABO</option>
		<option value="PARQUE DUQUE">DUQUE DE CAXIAS</option>
		<option value="PARQUE TAMARIZ">IGUABA GRANDE</option>
		<option value="PIABETÁ">MAGÉ</option>
		<option value="PITEIRAS">QUISSAMÃ</option>
		<option value="PORTUGUESA">RIO DE JANEIRO</option>
		<option value="RANCHITO">MANGARATIBA</option>
		<option value="SANTA CRUZ">RIO DE JANEIRO</option>
		<option value="SÃO BENTO">ANGRA DOS REIS</option>
		<option value="SÃO CAETANO">ITALVA</option>
		<option value="SAUDE">RIO DE JANEIRO</option>
		<option value="SOCIEDADE FLUMINENSE">CASIMIRO DE ABREU</option>
		<option value="TAQUARA">RIO DE JANEIRO</option>
		<option value="TIJUCA">RIO DE JANEIRO</option>
		<option value="TODOS OS SANTOS">RIO DE JANEIRO</option>
		<option value="VÁRZEA">TERESÓPOLIS</option>
		<option value="VILA DA PENHA">RIO DE JANEIRO</option>
		<option value="VILAR DOS TELES">SAO JOAO DE MERITI</option>
		<option value="ZE GAROTO">SÃO GONÇALO</option>
		');
	return $dados;
}

function zonaEleitoral(){
	$dados = printf('
		<option value="TODAS">TODAS</option>
		<option value="4">RIO DE JANEIRO - JARDIM BOTÂNICO</option>
		<option value="5">RIO DE JANEIRO - COPACABANA</option>
		<option value="7">RIO DE JANEIRO - TIJUCA</option>
		<option value="8">RIO DE JANEIRO - DEL CASTILHO</option>
		<option value="9">RIO DE JANEIRO - BARRA DA TIJUCA</option>
		<option value="10">RIO DE JANEIRO - PIEDADE</option>
		<option value="14">RIO DE JANEIRO - TODOS OS SANTOS</option>
		<option value="16">RIO DE JANEIRO - LARANJEIRAS</option>
		<option value="17">RIO DE JANEIRO - JARDIM BOTÂNICO</option>
		<option value="21">RIO DE JANEIRO - OLARIA</option>
		<option value="22">RIO DE JANEIRO - IRAJÁ</option>
		<option value="23">RIO DE JANEIRO - MARECHAL HERMES</option>
		<option value="24">RIO DE JANEIRO - BANGU</option>
		<option value="24">RIO DE JANEIRO - SANTA CRUZ</option>
		<option value="26">NOVA FRIBURGO - CENTRO</option>
		<option value="27">NOVA IGUAÇU - CENTRO</option>
		<option value="28">PARAÍBA DO SUL - CENTRO</option>
		<option value="29">PETRÓPOLIS - CENTRO</option>
		<option value="29">PIRAÍ - CENTRO</option>
		<option value="31">RESENDE - CENTRO</option>
		<option value="32">RIO BONITO - GREEN VALLEY</option>
		<option value="32">SANTA MARIA MADALENA - CENTRO</option>
		<option value="34">SANTO ANTÔNIO DE PÁDUA - DEZESSETE</option>
		<option value="35">SÃO FIDÉLIS - CENTRO</option>
		<option value="36">ZE GAROTO - SÃO GONÇALO</option>
		<option value="38">TERESÓPOLIS - VÁRZEA</option>
		<option value="39">TRAJANO DE MORAES - CENTRO</option>
		<option value="41">VASSOURAS - CENTRO</option>
		<option value="42">BOM JARDIM - CENTRO</option>
		<option value="43">NATIVIDADE - CENTRO</option>
		<option value="44">NILOPOLIS - CENTRO</option>
		<option value="46">SAO JOAO DE MERITI - VILAR DOS TELES</option>
		<option value="47">VOLTA REDONDA - ATERRADO</option>
		<option value="48">MIGUEL PEREIRA - CENTRO</option>
		<option value="49">CACHOEIRAS DE MACACU - BETEL</option>
		<option value="50">CASIMIRO DE ABREU - SOCIEDADE FLUMINENSEEL</option>
		<option value="52">CORDEIRO - CENTRO</option>
		<option value="54">MANGARATIBA - RANCHITO</option>
		<option value="55">MARICÁ - FLAMENGO</option>
		<option value="56">MENDES - CENTRO</option>
		<option value="59">SÃO PEDRO DA ALDEIA - ITINGA</option>
		<option value="60">SÃO SEBASTIÃO DO ALTO - CENTRO</option>
		<option value="61">SAPUCAIA - CENTRO</option>
		<option value="63">SILVA JARDIM - CENTRO</option>
		<option value="64">SUMIDOURO - CENTRO</option>
		<option value="65">PETRÓPOLIS - CENTRO</option>
		<option value="66">DUQUE DE CAXIAS - PARQUE DUQUE /option>
		<option value="67">NOVA IGUAÇU - CENTRO</option>
		<option value="68">CENTRO - SÃO GONÇALO</option>
		<option value="69">CENTRO - SÃO GONÇALO</option>
		<option value="71">NITEROI - CENTRO</option>
		<option value="72">NITEROI - CENTRO</option>
		<option value="75">CAMPOS DOS GOYTACAZES - CENTRO</option>
		<option value="76">CAMPOS DOS GOYTACAZES - CENTRO</option>
		<option value="77">DUQUE DE CAXIAS - PARQUE DUQUE</option>
		<option value="78">DUQUE DE CAXIAS - PARQUE DUQUE</option>
		<option value="80">NILOPOLIS - CENTRO</option>
		<option value="81">NOVA FRIBURGO - CENTRO</option>
		<option value="82">NOVA IGUAÇU - CENTRO</option>
		<option value="83">MESQUITA - CENTRO</option>
		<option value="84">NOVA IGUAÇU - CENTRO</option>
		<option value="85">PETRÓPOLIS - CENTRO</option>
		<option value="86">NEVES - SÃO GONÇALO</option>
		<option value="87">ZE GAROTO - SÃO GONÇALO</option>
		<option value="88">SAO JOAO DE MERITI - VILAR DOS TELES</option>
		<option value="89">SAO JOAO DE MERITI - VILAR DOS TELES</option>
		<option value="90">VOLTA REDONDA - ATERRADO</option>
		<option value="91">BARRA MANSA - BARBARÁ</option>
		<option value="92">ARARUAMA - CENTRO</option>
		<option value="93">BARRA DO PIRAÍ - MATADOURO</option>
		<option value="94">BARRA MANSA - BARBARÁ</option>
		<option value="95">BOM JESUS DO ITABAPOANA - CENTRO</option>
		<option value="96">CABO FRIO - CENTRO</option>
		<option value="97">CAMBUCI - CENTRO</option>
		<option value="98">CAMPOS DOS GOYTACAZES - CENTRO</option>
		<option value="99">CAMPOS DOS GOYTACAZES - CENTRO</option>
		<option value="100">CAMPOS DOS GOYTACAZES - CENTRO</option>
		<option value="101">CANTAGALO - CENTRO</option>
		<option value="102">CARMO - CENTRO</option>
		<option value="103">DUQUE DE CAXIAS - PARQUE DUQUE</option>
		<option value="104">ITABORAI - CENTRO</option>
		<option value="107">ITAPERUNA - CENTRO</option>
		<option value="109">MACAÉ - CENTRO </option>
		<option value="110">MAGÉ - CENTRO </option>
		<option value="111">VALENÇA - CENTRO </option>
		<option value="112">MIRACEMA - CENTRO </option>
		<option value="113">NITEROI - CENTRO</option>
		<option value="114">NITEROI - CENTRO</option>
		<option value="115">NITEROI - CENTRO</option>
		<option value="116">ANGRA DOS REIS - SÃO BENTO</option>
		<option value="117">RIO DE JANEIRO - ILHA DO GOVERNADOR</option>
		<option value="118">RIO DE JANEIRO - CASCADURA</option>
		<option value="119">RIO DE JANEIRO - BARRA DA TIJUCA</option>
		<option value="120">RIO DE JANEIRO - CAMPO GRANDE</option>
		<option value="122">RIO DE JANEIRO - CAMPO GRANDE</option>
		<option value="123">RIO DE JANEIRO - DEODORO</option>
		<option value="125">RIO DE JANEIRO - SANTA CRUZ</option>
		<option value="126">DUQUE DE CAXIAS - PARQUE DUQUE</option>
		<option value="127">DUQUE DE CAXIAS - PARQUE DUQUE</option>
		<option value="128">DUQUE DE CAXIAS - 25 DE AGOSTO</option>
		<option value="129">CAMPOS DOS GOYTACAZES - CENTRO</option>
		<option value="131">VOLTA REDONDA - ATERRADO</option>
		<option value="132">CENTRO - SÃO GONÇALO</option>
		<option value="133">CENTRO - SÃO GONÇALO</option>
		<option value="134">CENTRO - SÃO GONÇALO</option>
		<option value="135">CENTRO - SÃO GONÇALO</option>
		<option value="136">CENTRO - SÃO GONÇALO</option>
		<option value="137">ZE GAROTO - SÃO GONÇALO</option>
		<option value="138">QUEIMADOS - FANCHEM</option>
		<option value="140">NITEROI - CENTRO</option>
		<option value="141">ITALVA - SAO CAETANO</option>
		<option value="142">NITEROI - CENTRO</option>
		<option value="143">NITEROI - CENTRO</option>
		<option value="144">NITEROI - CENTRO</option>
		<option value="145">SAO JOAO DE MERITI - VILAR DOS TELES</option>
		<option value="146">ARRAIAL DO CABO - PRAIA DOS ANJOS</option>
		<option value="147">ANGRA DOS REIS - SÃO BENTO</option>
		<option value="148">MAGÉ - PIABETÁ</option>
		<option value="149">GUAPIMIRIM - BANANAL</option>
		<option value="150">MESQUITA - CENTRO</option>
		<option value="151">ITABORAI - CENTRO </option>
		<option value="152">BELDFORD ROXO - CENTRO</option>
		<option value="153">BELDFORD ROXO - CENTRO</option>
		<option value="154">BELDFORD ROXO - CENTRO</option>
		<option value="155">BELDFORD ROXO - CENTRO</option>
		<option value="156">NOVA IGUAÇU - BAIRRO DA LUZ</option>
		<option value="157">NOVA IGUAÇU - CENTRO</option>
		<option value="158">NOVA IGUAÇU - CENTRO</option>
		<option value="159">NOVA IGUAÇU - CENTRO</option>
		<option value="161">RIO DE JANEIRO - OLARIA</option>
		<option value="162">RIO DE JANEIRO - OLARIA</option>
		<option value="165">RIO DE JANEIRO - JARDIM BOTÂNICO</option>
		<option value="166">RIO DE JANEIRO - JARDIM BOTÂNICO</option>
		<option value="166">RIO DE JANEIRO - JARDIM BOTÂNICO</option>
		<option value="170">RIO DE JANEIRO - MARACANÃ</option>
		<option value="172">ARMAÇÃO DOS BÚZIOS - CENTRO</option>
		<option value="174">TRES RIOS - NOVA NITERÓI</option>
		<option value="175">RIO DE JANEIRO - GUADALUPE</option>
		<option value="176">RIO DE JANEIRO - IRAJÁ</option>
		<option value="177">RIO DE JANEIRO - IRAJÁ</option>
		<option value="179">RIO DE JANEIRO - BARRA DA TIJUCA</option>
		<option value="180">RIO DE JANEIRO - TAQUARA</option>
		<option value="181">IGUABA GRANDE - PARQUE TAMARIZ</option>
		<option value="182">RIO DE JANEIRO - TAQUARA</option>
		<option value="183">PORTO_REAL - CENTRO</option>
		<option value="184">RIO DAS OSTRAS - BOSQUE DA PRAIA</option>
		<option value="185">RIO DE JANEIRO - TAQUARA</option>
		<option value="186">SAO JOAO DE MERITI - VILAR DOS TELES</option>
		<option value="187">SAO JOAO DE MERITI - VILAR DOS TELES</option>
		<option value="188">RIO DE JANEIRO - OLARIA</option>
		<option value="189">RIO DE JANEIRO - VILA DA PENHA</option>
		<option value="190">RIO DE JANEIRO - IRAJÁ</option>
		<option value="191">RIO DE JANEIRO - ILHA DO GOVERNADOR</option>
		<option value="192">RIO DE JANEIRO - PORTUGUESA</option>
		<option value="194">DUQUE DE CAXIAS - PARQUE DUQUE</option>
		<option value="195">TERESÓPOLIS - VÁRZEA</option>
		<option value="196">SÃO JOSÉ DO VALE DO RIO PRETO - CENTRO</option>
		<option value="197">CENTRO - SÃO GONÇALO</option>
		<option value="198">RESENDE - PARQUE DUQUE</option>
		<option value="199">NITEROI - CENTRO</option>
		<option value="200">DUQUE DE CAXIAS - PARQUE DUQUE</option>
		<option value="201">NILOPOLIS - CENTRO</option>
		<option value="202">VOLTA REDONDA - ATERRADO</option>
		<option value="203">BARRA MANSA - BARBARÁ</option>
		<option value="204">RIO DE JANEIRO - SAUDE</option>
		<option value="211">RIO DE JANEIRO - JARDIM BOTÂNICO</option>
		<option value="212">RIO DE JANEIRO - JARDIM BOTÂNICO</option>
		<option value="214">RIO DE JANEIRO - MEIER</option>
		<option value="216">RIO DE JANEIRO - DEL CASTILHO</option>
		<option value="218">RIO DE JANEIRO - CASCADURA</option>
		<option value="219">RIO DE JANEIRO - CASCADURA</option>
		<option value="221">NILOPOLIS - CENTRO</option>
		<option value="222">NOVA FRIBURGO - CENTRO</option>
		<option value="225">SEROPEDICA - JARDIM SAO JORGE</option>
		<option value="226">PETRÓPOLIS - ITAIPAVA</option>
		<option value="227">PETRÓPOLIS - CENTRO</option>
		<option value="229">RIO DE JANEIRO - MARACANÃ</option>
		<option value="230">RIO DE JANEIRO - BANGU</option>
		<option value="233">RIO DE JANEIRO - BANGU</option>
		<option value="234">RIO DE JANEIRO - BANGU</option>
		<option value="238">RIO DE JANEIRO - BANGU</option>
		<option value="241">RIO DE JANEIRO - SANTA CRUZ</option>
		<option value="242">RIO DE JANEIRO - CAMPO GRANDE</option>
		<option value="243">RIO DE JANEIRO - SANTA CRUZ</option>
		<option value="244">RIO DE JANEIRO - CAMPO GRANDE</option>
		<option value="245">RIO DE JANEIRO - CAMPO GRANDE</option>
		<option value="246">RIO DE JANEIRO - SANTA CRUZ</option>
		<option value="249">CAMPOS DOS GOYTACAZES - CENTRO</option>
		<option value="250">NOVA IGUAÇU - BAIRRO DA LUZ</option>
		<option value="252">RIO DE JANEIRO - JARDIM BOTÂNICO</option>
		<option value="254">MACAÉ - CENTRO </option>
		<option value="255">QUISSAMÃ - PITEIRAS</option>
		<option value="256">CABO FRIO - CENTRO</option>
		');
	return $dados;
}
?>