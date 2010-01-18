<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>HYMMNOSERVER - Main</title>
		<?php include 'common/resources.xml'; ?>
	</head>
	<body>
		<?php include 'common/header.xml'; ?>
		<div class="text-basic">
			<table>
				<tr>
					<td align="left" valign="top" style="width: 450px;">
						<p>
							<span class="text-title">Welcome to HYMMNOSERVER</span><br/>
							The world of Ar tonelico, Sol Ciel, is home to a language of Song Magic, known as &quot;Hymmnos Words&quot;.
							<br/>
							Here, you will be able to learn how this language works and you may look up words in English and Japanese.
						</p>
						<p style="color: red;">
							Please be aware that this English version is an unofficial, fan-translated work and may, therefore, contain
							errors, and suffer from synchronization issues with the original Japanese site.<br/>
							Some features differ (for better or worse), and some details, such as examples, were intentionally rewritten
							in a manner believed to make more sense to an English-speaking audience.<br/><br/>
							If you note any problems, please let the appropriate maintainer know; see the
							<a href="./credits.php">credits page</a> for details.
						</p>
						<noscript>
							<p style="color: red;">
								This site was designed with JavaScript 1.5, XHTML 1.1, and CSS 2.0.
								It is accessible using limited browsers (like lynx, elinks, and Microsoft's Internet Explorer),
								but some features will be unavailable.
							</p>
						</noscript>
						<hr/>
						<p>
							<span class="text-title">⠕ The grammar of Hymmnos Words</span><br/>
							Hymmnos Words are organized into a simple grammar. Before perusing the dictionary, you should consider
							learning about its syntax to deepen your understanding. To the right, you will find links to articles
							about the different types of Hymmnos and details about how the grammar works.
						</p>
						<p>
							<span class="text-title">⠕ Hymmnos characters</span><br/>
							Hymmnos Words are written in a special script. Browsing this archive will be more enjoyable if you
							are able to see these characters. A TrueType Font for Hymmnos script is available as a free download
							to your right.
						</p>
						<ul class="basic-inline text-small">
							<li>
								Users of modern Unix-like operating systems can usually just save the font file into ~/.fonts/
								and make	use of it immediately.
							</li>
							<li>
								Mac users may drag fonts from the Finder into the Fonts section under their Library.
							</li>
							<li>
								Those using Microsoft Windows will need to do some weird dance that may or may not involve
								a lot of right-clicking, finding a Fonts directory that may or may not be write-protected,
								and, possibly, restarting their system several times to get the font-indexer to notice the
								addition.
							</li>
						</ul>
						<p>
							<span class="text-title">⠕ Searching for Hymmnos</span><br/>
							The search bar at the top of every page allows you to look up Hymmnos in the database.
							Using this feature, you can do the following:
						</p>
						<blockquote class="text-small">
							<p>
								<span class="text-title-small">1) Find a word in Hymmnos</span><br/>
								Enter a word in Hymmnos and submit it.
								You will see a list of all words beginning with the characters you entered.
							</p>
							<p>
								<span class="text-title-small">2) Look up an entire Hymmnos sentence</span><br/>
								Enter several words in Hymmnos, separated by spaces, and submit them.
								A translation for each word will be presented.
							</p>
							<p>
								<span class="text-title-small">3) Find the Hymmnos for an English word</span><br/>
								Enter a word in English, then submit it.
								All Hymmnos words that involve the fragment you provided will be displayed.
							</p>
							<p>
								<span class="text-title-small">4) Find Hymmnos by kana</span><br/>
								Enter the first few characters that represent the pronunciation of the Hymmnos
								you are trying to find, then submit them.
								All Hymmnos words with Japanese pronunciation beginning with what you provided
								will be displayed.
							</p>
							<p>
								<span class="text-title-small">5) Find Hymmnos by romaji</span><br/>
								This works in the same manner as searching by kana, but it uses a romaji
								representation of words in Hymmnos, which may be easier for some users.
							</p>
							<p>
								<span class="text-title-small">6) Browse Hymmnos by letter or category</span><br/>
								Click the &quot;Full Hymmnos lexicon&quot; link below the search bar and you will
								be presented with a full index of the dictionary, split based on the Roman alphabet
								or syntax class.
							</p>
							<p>
								<span class="text-title-small">7) Automate advanced grammar processing</span><br/>
								Click the &quot;Advanced grammar resources&quot; link below the search bar and
								you will be presented with an interface that supports the following:
							</p>
							<ul style="margin-top: -10px;">
								<li>Syntactic validation and structural processing</li>
								<li>Binasphere encoding and decoding</li>
								<li>Persistent Emotion Sounds</li>
							</ul>
						</blockquote>
					</td>
					<td align="right" valign="top" style="width: 184px;">
						<table style="width: 100%; border-color: #001144; border-width: 1px; border-style: outset;">
							<tr>
								<td class="fontcell" style="text-align: center; style=width: 184px;">
									<a href="./static/hymmnos.ttf" style="text-decoration: none; display: block;">
										<img src="./static/hymgrp.gif" style="border-width: 0;" alt="Download the Hymmnos TrueType Font (v1.1)"/>
										<span style="color: white; font-weight: bold; margin-top: -10px;">
											<span style="font-size: 9pt;">Download the Hymmnos</span><br/>
											<span style="font-size: 8pt;">TrueType Font (v1.1)</span>
										</span>
									</a>
								</td>
							</tr>
						</table>
						<br/>
						<table style="width: 100%; border-collapse: collapse;">
							<tr>
								<td class="titlecell">
									⠕ Recent Updates
								</td>
							</tr>
							<tr>
								<td class="infocell">
									<ul class="basic-inline" style="font-weight: bold; font-size: 7pt; line-height: 3.5mm;">
										<li>(10/1/2010) Migrated to uguu.ca</li>
										<li>(3/7/2009) Syntax parser online</li>
										<li>(6/2/2009) Binasphere encoder</li>
										<li>(3/2/2009) Revised terminology</li>
										<li>(30/1/2009) Binasphere decoder</li>
									</ul>
								</td>
							</tr>
							<tr>
								<td class="titlecell">
									⠕ Hymmnos Information
								</td>
							</tr>
							<tr>
								<td class="infocell">
									<ul class="basic-inline" style="font-weight: bold; font-size: 9pt; line-height: 3.5mm;">
										<li><a href="./introduction.php">Introduction</a></li>
										<li><a href="./types.php">Hymmnos Types</a></li>
										<li><a href="./dialects.php">Dialects</a></li>
										<li><a href="./servers.php">Song Magic Servers</a></li>
										<li><a href="./grammar.php">Grammar (Standard)</a></li>
										<li><a href="./grammar2.php">Grammar (Pastalia)</a></li>
										<li><a href="./credits.php">Credits</a></li>
									</ul>
								</td>
							</tr>
							<tr>
								<td class="titlecell">
									⠕ Link Banner
								</td>
							</tr>
							<tr>
								<td class="infocell" style="text-align: center;">
									<a href="http://game.salburg.com/hymmnoserver/">
										<img src="./static/hssupA_02.gif" style="border-width: 0px; margin-top: 2px;" alt="Japanese HYMMNOSERVER website"/>
									</a>
								</td>
							</tr>
							<tr>
								<td class="titlecell">
									⠕ Related Resources
								</td>
							</tr>
							<tr>
								<td class="infocell">
									<ul class="basic-inline" style="font-weight: bold; font-size: 9pt; line-height: 3.5mm;">
										<li><a href="http://conlang.wikia.com/wiki/Conlang:Hymmnos">Hymmnos, Conlang</a></li>
										<li><a href="http://artonelico.isisview.org/">A Reyvateil's Melody</a></li>
										<li><a href="http://bitbucket.org/dervish_candela/hymmnodict/wiki/Home">Hymmnodict</a></li>
									</ul>
								</td>
							</tr>
							<tr>
								<td class="titlecell">
									⠕ Mirrors
								</td>
							</tr>
							<tr>
								<td class="infocell">
									<ul class="basic-inline" style="font-weight: bold; font-size: 9pt; line-height: 3.5mm;">
										<li><a href="http://hymmnoserver.uguu.ca/">uguu.ca</a></li>
										<li><a href="http://hamsterx.homelinux.org/hymmnoserver/">hamsterx.homelinux.org</a></li>
									</ul>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<hr/>
			<p>
				<b>Community-friendly</b><br/>
				This site is an open source effort, released in its entirety under the
				<a href="http://creativecommons.org/licenses/by-nc-sa/3.0/">by-nc-sa/3.0 Creative Commons license</a>.
				If you agree to the rather lax terms of this license, you may grab all of its materials from its
				<a href="http://projects.uguu.ca/hymmnoserver/">project site</a>.
			</p>
		</div>
		<?php include 'common/footer.xml'; ?> 
	</body>
</html>

