<?php include('./header1.inc'); ?>
<h1>Why care about multiple genetic variations?</h1>
<p>Complex diseases are likely to be caused by multiple genes and/or
multiple mutations on individual genes, so quantitively measuring the 
effect of multiple variants together should be helpful for detecting
causal genes/mutations for diseases.</p>
<p>When single mutation occurs, if it is not detrimental, it can still
exist in populations with low frequency. Over time, other mutations can also
occur and thus multiple mutations can accumulate on the same gene.Compared to
individual mutations, multiple mutations can be either more deleterious or
less deleterious, the latter case is also known as compensatory mutations. 
Although it is not known which senario is more prevalent in evolution, both
senarios have ample literature support.</p>
<p>Although many variants annotation and scoring tools are around, these tools
are limited to annotate single mutations or single type of mutations (SNP or 
Indel). Thus, a more flexible tool is needed. Hidden Markov Model Variants
Scoring (HMMvar) is a hidden Markov model based approach, to investigate the 
combined effect of multiple variants. It can predict the functional effects of 
both single and general multiple variations on proteins.</p>
<h1>What we have here?</h1>
<p>Please download HMMvar from the <a href='download.php'>download</a> page. 
You can also <a href='download.php'>download</a> or <a href='search.php'>search</a> for 
the pre-computed single or set scores for the 1000 Genomes project. The 
pre-computed hidden Markov models are also available for you to download to get
started for your customered datasets.</p>
<p>If you are planning to use HMMvar, please cite the paper,</p>
<p>Liu, M, Watson, LT, and Zhang, L: Quantitative prediction of the effect of genetic variation using hidden Markov models
. BMC Bioinformatics 2014, 15:5</p>
<p>balabala...</p>
<?php include('./footer1.inc'); ?>