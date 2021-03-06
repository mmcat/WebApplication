<?php include('./header1.inc'); ?>
<h1>Current version of HMMvar:V1.1.0</h1>
Please download the latest version from <a href='https://bioinformatics.cs.vt.edu
/zhanglab/hmmvar/hmmVar1.1.0.tar.gz'>here</a>. Other release information is available
at <a href='https://github.com/mmcat/HMMvar1.1.0'>Github</a>. 
<p>Release notes (Major updates):
<ul>
<li>2014Dec04: add the option for using precomputed profile HMMs.</li>
<li>2014Jun12: add the functionality for multiple mutations.</li>
<li>2014Jan11: add the option for using precomputed blast results.</li>
<li>2013Nov15: make it available for both dna sequences and protein sequences. </li>
<li>2013Jul14: the first release.</li>
</ul>
</p>

<h1>Pre-computed scores for variants from 1000 Genomes project</h1> 
<p>Based on the 1000 Genomes Project variants (Phase I), the compensatory mutations (CM) 
sets and non-compensatory mutations (nonCM) sets are available
for you to download. All the compound homozygous set scores and single variants scores are also
provided. To know the details about these sets, please read the paper. 
(<a href='data/readme.txt'>table schema</a>)</p>

<p><a href='data/CMSets.txt'>CM set scores:</a> there is probably a compensatory effect
by combining the variants in the set.</p>
<p><a href='data/nonCMSets.txt'>nonCM set scores:</a> the effects of single variants are 
reserved in the set.</p>
<p><a href='data/set_var_scores.txt'>Set scores:</a> all the compound homozygous mutations
determined by the genotypes and ancestral alleles are scored.</p>
<p><a href='data/single_var_scores.txt'>Single scores:</a> single variants in the above sets
are also scored.</p>

<h1>Pre-computed profile hidden Markov models</h1>
<p>22,004 precomputed profile HMMs are gethered for you to play with your own 
variants data sets. These HMMs are generated by <a href='http://hmmer.janelia.org/'>
HMMER3</a> tool based on the 
multiple alignments of 45 vertebrate genomes with Human obtained from 
<a href='http://hgdownload.soe.ucsc.edu/goldenPath/hg19/multiz46way/'>UCSC</a>
database. Each file is an HMM corresponding to a specific protein sequence (the
file name indicates the reference transcript).Please find the HMMs 
<a href='data/hmms.tar.gz'>here</a>(1.05G).</p>

<p>We recommend to use a downloading manager or tool (e.g. wget) that allow you 
to continue interupted downloads due to the big size of the files.</p>

<?php include('./footer1.inc'); ?>