<?php
/**
 * @package WPSEO\XML_Sitemaps
 */

if ( ! defined( 'WPSEO_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

// This is to prevent issues with New Relics stupid auto injection of code. It's ugly but I don't want
// to deal with support requests for other people's wrong code...
if ( extension_loaded( 'newrelic' ) && function_exists( 'newrelic_disable_autorum' ) ) {
	newrelic_disable_autorum();
}

// Echo so opening tag doesn't get confused for PHP. R.
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
	<xsl:stylesheet version="2.0"
	                xmlns:html="http://www.w3.org/TR/REC-html40"
	                xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
	                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
	                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
	<xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
			<title>XML Sitemap</title>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<style type="text/css">
				body {
					font-family: Helvetica, Arial, sans-serif;
					font-size: 13px;
					color: #545353;
				}
				table {
					border: none;
					border-collapse: collapse;
				}
				#sitemap tr.odd td {
					background-color: #eee !important;
				}
				#sitemap tbody tr:hover td {
					background-color: #ccc;
				}
				#sitemap tbody tr:hover td, #sitemap tbody tr:hover td a {
					color: #000;
				}
				#content {
					margin: 0 auto;
					width: 1000px;
				}
				.expl {
					margin: 18px 3px;
					line-height: 1.2em;
				}
				.expl a {
					color: #da3114;
					font-weight: 600;
				}
				.expl a:visited {
					color: #da3114;
				}
				a {
					color: #000;
					text-decoration: none;
				}
				a:visited {
					color: #777;
				}
				a:hover {
					text-decoration: underline;
				}
				td {
					font-size:11px;
				}
				th {
					text-align:left;
					padding-right:30px;
					font-size:11px;
				}
				thead th {
					border-bottom: 1px solid #000;
					cursor: pointer;
				}
			</style>
		</head>
		<body>
		<div id="content">
			<h1>XML Sitemap</h1>
			<p class="expl">
				Generated by <a href="https://yoast.com/">Yoast</a> <a href="https://yoast.com/wordpress/plugins/seo/">SEO</a>, this is an XML Sitemap, meant for consumption by search engines.<br/>
				You can find more information about XML sitemaps on <a href="http://sitemaps.org">sitemaps.org</a>.
			</p>
			<xsl:if test="count(sitemap:sitemapindex/sitemap:sitemap) &gt; 0">
				<p class="expl">
					This XML Sitemap Index file contains <xsl:value-of select="count(sitemap:sitemapindex/sitemap:sitemap)"/> sitemaps.
				</p>
				<table id="sitemap" cellpadding="3">
					<thead>
					<tr>
						<th width="75%">Sitemap</th>
						<th width="25%">Last Modified</th>
					</tr>
					</thead>
					<tbody>
					<xsl:for-each select="sitemap:sitemapindex/sitemap:sitemap">
						<xsl:variable name="sitemapURL">
							<xsl:value-of select="sitemap:loc"/>
						</xsl:variable>
						<tr>
							<td>
								<a href="{$sitemapURL}"><xsl:value-of select="sitemap:loc"/></a>
							</td>
							<td>
								<xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(' ', substring(sitemap:lastmod,12,5)),concat(' ', substring(sitemap:lastmod,20,6)))"/>
							</td>
						</tr>
					</xsl:for-each>
					</tbody>
				</table>
			</xsl:if>
			<xsl:if test="count(sitemap:sitemapindex/sitemap:sitemap) &lt; 1">
				<p class="expl">
					This XML Sitemap contains <xsl:value-of select="count(sitemap:urlset/sitemap:url)"/> URLs.
				</p>
				<p class="expl"><a href="<?php echo esc_url( home_url( 'sitemap_index.xml' ) ) ?>">&#8593; Sitemap Index</a></p>
				<table id="sitemap" cellpadding="3">
					<thead>
					<tr>
						<th width="80%">URL</th>
						<th width="5%">Images</th>
						<th title="Last Modification Time" width="15%">Last Mod.</th>
					</tr>
					</thead>
					<tbody>
					<xsl:variable name="lower" select="'abcdefghijklmnopqrstuvwxyz'"/>
					<xsl:variable name="upper" select="'ABCDEFGHIJKLMNOPQRSTUVWXYZ'"/>
					<xsl:for-each select="sitemap:urlset/sitemap:url">
						<tr>
							<td>
								<xsl:variable name="itemURL">
									<xsl:value-of select="sitemap:loc"/>
								</xsl:variable>
								<a href="{$itemURL}">
									<xsl:value-of select="sitemap:loc"/>
								</a>
							</td>
							<td>
								<xsl:value-of select="count(image:image)"/>
							</td>
							<td>
								<xsl:value-of select="concat(substring(sitemap:lastmod,0,11),concat(' ', substring(sitemap:lastmod,12,5)),concat(' ', substring(sitemap:lastmod,20,6)))"/>
							</td>
						</tr>
					</xsl:for-each>
					</tbody>
				</table>
			</xsl:if>
		</div>
		<script type="text/javascript" src="<?php echo includes_url( 'js/jquery/jquery.js' ) ?>"></script>
		<script type="text/javascript" src="<?php echo plugins_url( 'js/dist/jquery.tablesorter.min.js', WPSEO_FILE ) ?>"></script>
		<script	type="text/javascript"><![CDATA[
			jQuery(document).ready(function() {
				jQuery("#sitemap").tablesorter( { widgets: ['zebra'] } );
			});
			]]></script>
		</body>
		</html>
	</xsl:template>
	</xsl:stylesheet><?php
