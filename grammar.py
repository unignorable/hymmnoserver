#!/bin/env python -OO
# -*- coding: utf-8 -*-
"""
Hymmnoserver script: grammar

Purpose
=======
 Provides an interface for processing and displaying user input.
 
Legal
=====
 All code, unless otherwise indicated, is original, and subject to the terms of
 the Creative Commons Attribution-Noncommercial-Share Alike 3.0 License,
 which is provided in license.README.
 
 (C) Neil Tallim, 2009
"""
import cgi
import re
import urllib

import common.syntax as syntax
import common.transformations as transformations
import secure.db as db

def _renderMicroTransformation(component):
	"""
	Renders a value-bar in a transformation-list.
	
	@type component: basestring
	@param component: The Hymmnos data to display.
	"""
	link = "./search.php?" + urllib.urlencode({'word': component})
	line = cgi.escape(component, True)
	req.write("""<td class="transformation">""")
	req.write("""<div style="font-family: hymmnos; font-size: 1.5em;"><a href="%s" style="display: block; color: #00008B; text-decoration: none; outline: none;">%s</a></div>""" % (link, line))
	req.write("""<div><a href="%s" style="display: block; color: #00008B; text-decoration: none; outline: none;">%s</a></div>""" % (link, line))
	req.write("""</td>""")
	
def _renderMacroTransformation(phrase, components, unknown):
	"""
	Renders the result of a transformation.
	
	@type phrase: basestring
	@param phrase: The Hymmnos phrase processed.
	@type components: sequence
	@param components: A collection of Hymmnos data to display.
	@type unknown: sequence
	@param unknown: A collection of all words not recognized in the input.
	"""
	req.write("""<table style="border-spacing: 1px; color: white; background: #808080; border: 1px solid black; width: 100%;">""")
	req.write("""<tr><td style="color: #00008B; background: #D3D3D3; padding-left: 5px; padding-top: 5px; padding-right: 2px;" colspan="2">""")
	req.write("""<div style="font-family: hymmnos; font-size: 18pt;">%s</div>""" % (phrase))
	req.write("""<div style="font-size: 12pt;">%s</div>""" % (phrase))
	req.write("""</td></tr>""")
	for (i, lines) in enumerate(components):
		req.write("""<tr><td class="transformation-id">%i</td>""" % (i))
		if len(lines) > 1:
			req.write("""<td style="background: #808080;"><table style="width: 100%; border-spacing: 1px;">""")
			for (j, line) in enumerate(lines):
				req.write("""<tr><td class="transformation-id">%i</td>""" % (j))
				_renderMicroTransformation(line)
				req.write("""</td></tr>""")
			req.write("""</table></td>""")
		else:
			_renderMicroTransformation(lines[0])
		req.write("""</tr>""")
	if(unknown):
		plural = ''
		if len(unknown) > 1:
			plural = 's'
		req.write("""<tr><td style="color: white; background: black;" colspan="2">""")
		req.write("""<div style="font-size: 10pt;">Unknown word%s: %s</div>""" % (plural, cgi.escape(", ".join(unknown), True)))
		req.write("""</td></tr>""")
	req.write("""</table>""")
	
def _renderFailure(message):
	"""
	Renders a message indicating that processing failed.
	
	@type message: basestring
	@param message: A description of the error that occurred.
	"""
	req.write("""
		<table style="border-collapse: collapse; border: 1px solid black; width: 100%%;">
			<tr>
				<td style="color: #00008B; text-align: center; background: #D3D3D3;">
					<div style="font-size: 18pt;">an error occurred while processing your request</div>
				</td>
			</tr>
			<tr>
				<td style="background: red; color: white; text-align: center;">%s</td>
			</tr>
		</table>
	""" % (message))
	
	
form = cgi.FieldStorage()

print "Content-Type: application/xhtml+xml"
print

print """
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>HYMMNOSERVER - Grammar Processor</title>
"""

resources = open("common/resources.xml", 'r')
print resources.read()
resources.close()

print """
	</head>
	<body>
"""

header = open("common/header.xml", 'r')
print header.read()
header.close()

query = form.getfirst("query")
if not query or not query.strip():
	print """
	<div class="text-basic">
		<div class="section-title text-title-small">⠕ Advanced grammar resources</div>
		<big>The following features are made available through this interface:</big>
		<blockquote class="text-small">
			<p>
				<span class="text-title-small">1) Syntax validation and structural analysis</span><br/>
				Enter a <b>complete sentence</b> in Hymmnos and submit it.
				If the syntax processor is able to analyze your input, a syntax tree will be produced,
				informing you of the structure of what you have provided. It is hoped that this will
				help in translating sentences.
				<br/><br/>
				<small>
					Please note that this feature is highly experimental and that it will not (and never
					will, due to Hymmnos having some
					<a href="http://en.wikipedia.org/wiki/NP-complete">NP-complete</a>-looking structures)
					recognize all valid sentences, and it may also approve of some invalid sentences due to
					flexibility encoded to handle more complex patterns.
					<br/><br/>
					Note also that this is not a production-grade linguistics work. The syntax trees it
					generates are amateurish in nature, occasionally lacking proper relationship structures,
					and are, thus, intended solely to assist humans in infering meaning.
				</small>
			</p>
			<p>
				<span class="text-title-small">2) Binasphere conversion</span><br/>
				Enter multiple (two or more) phrases and Binasphere output will be generated.
				<br/><br/>
				Enter Binasphere text and its constituent phrases will be reconstructed.
			</p>
			<p>
				<span class="text-title-small">3) Persistent Emotion Sounds application</span><br/>
				Enter a Persistent Emotion Sounds passage and the effective full-sentence-form
				equivalents will be produced.
			</p>
		</blockquote>
	</div>
	"""
else:
	db_con = db.getConnection()
	lines = [line for line in [l.strip() for l in query.splitlines()] if line]
	try:
		try: #Attempt to decode as a Binasphere phrase, since this fails in constant time.
			(lines_list, unknown) = transformations.decodeBinasphere(' '.join(lines), _db_con)
			_renderMacroTransformation(cgi.escape(_query, True), lines_list, unknown)
		except transformations.FormatError:
			lines = [l for l in [re.sub(r'\s+\.\s+', ' ', re.sub(r'^\s*|[?!,:\'"/\\]|\.\.+|\s*\.*\s*$', '', line)) for line in lines] if l]
			if len(lines) > 1:
				try: #Try to apply Persistent Emotion Sounds markup, since this is purely linear.
					(new_lines, processed, unknown) = transformations.applyPersistentEmotionSounds(lines, _db_con)
					_renderMacroTransformation('<br/>'.join([cgi.escape(line) for line in new_lines]), processed, unknown)
				except transformations.FormatError: #Try to encode as a Binasphere phrase.
					(phrase, lines_list, unknown) = transformations.encodeBinasphere(lines, _db_con)
					_renderMacroTransformation(cgi.escape(phrase, True), lines_list, unknown)
			else: #Attempt syntax processing.
				try:
					(tree, display_string, result) = syntax.processSyntax(lines[0], _db_con)
					if result is None:
						_renderFailure("unable to validate sentence; it may not be complete")
					else:
						req.write(syntax.renderResult_xhtml(tree, display_string))
				except syntax.ContentError, e:
					_renderFailure("unable to process input: %s" % (e))
	except transformations.ContentError, e:
		_renderFailure("unable to process input: %s" % (e))
	except Exception, e:
		_renderFailure("an unexpected error occurred: %s" % (e))
		
	try:
		db_con.close()
	except:
		pass
		
print """
<hr/>
<form method="get" action="/hymmnoserver/grammar.psp">
	<div>
		<div style="text-align: center;">
			<textarea name="query" id="query" rows="5" cols="80"><%=cgi.escape(_query)%></textarea>
		</div>
		<div style="text-align: right;">
			<input type="button" value="Clear" onclick="document.getElementById('query').value='';"/>
			<input type="button" value="Remove linebreaks" onclick="document.getElementById('query').value = document.getElementById('query').value.replace(/\r?\n/g, ' ');"/>
			<input type="submit" value="Process query"/>
		</div>
	</div>
</form>
"""

footer = open("common/footer-py.xml", 'r')
print footer.read()
footer.close()

print """
		</div>
	</body>
</html>
"""
