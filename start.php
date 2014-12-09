<?php include('header1.inc'); ?>
<h1>Quick Start Guide</h1>
<p>Please follow these steps to quickly set up HMMvar.</p>
<ol>
	<li>Download HMMvar package and pre-computed HMMs at the <a href='download.php'>Downloads</a> page.</li>
	<li>If you are using Linux or MAC OS, please go to the directory of the HMMvar package and 
	install it by running the following commands.</li>
		<ul style="list-style-type:disc padding-left:20px">
			<li>./configure</li>
			<li>make</li>
			<li>make install</li>
		</ul>
	
	<li>Prepare your input files (sequence file and variants file). You can find the formats of 
	the input files <a href="README">here</a>.</li> 
	<li>Find the corresponding hidden Markov model from the HMM library you downloaded at step 1.</li>
	<li>Implement HMMvar by the command hmmvar -q &lt;query filename&gt; -v &lt;variants filename&gt; -hmmbuildout &lt;HMM&gt; </li>
	<li>Check the output file (&lt;variants filename&gt;.out). To interpret the output file, please refer to the
	instruction <a href='README'>here</a>.</li>
</ol>

<?php include('footer1.inc'); ?>