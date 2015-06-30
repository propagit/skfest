;
(function($)
	{
	$.fn.slidingImageGallery=function(bq)
		{
		var ba=250;
		var bb=75;
		var bc=50;
		var bd=5000;
		var be=800;
		var bf=400;
		var bg=600;
		var bh=0.1;
		var bi=600;
		var bj="auto_adjust";
		var bk="update_text";
		var bl="update_buttons";
		var bm="show_scrollbar";
		var bn="hide_scrollbar";
		var bo="update_knob";
		var bp=
			{
			width:960,height:400,currentItem:0,randomize:false,autoPlay:true,playOnce:false,buttonPosition:"left",buttonWidth:250,buttonHeight:60,buttonDisplayLength:4,buttonShowArrow:true,autoAdjust:true,delay:bd,transition:"random",transitionSpeed:be,easing:"",showTimer:true,timerAlign:"bottom",pauseRollOver:false,autoCenter:true,textRollOver:false,textEffect:"fade",textSync:true,blockSize:bb,verticalSize:bc,horizontalSize:bc,blockDelay:35,verticalStripeDelay:90,horizontalStripeDelay:180,scrollType:"mouse_move",showScrollbar:true,moveBy1:true,oldItem:-1,button:"next"
		};
		var bq=$.extend(
			{
		}
		,bp,bq);
		var br=(bq.width-bq.buttonWidth);
		var bs=bq.buttonDisplayLength;
		var bt=0;
		var bu=
			{
			"block.top":bt++,"block.right":bt++,"block.bottom":bt++,"block.left":bt++,"block.drop":bt++,"diag.fade":bt++,"diag.exp":bt++,"rev.diag.fade":bt++,"rev.diag.exp":bt++,"block.fade":bt++,"block.exp":bt++,"block.top.zz":bt++,"block.bottom.zz":bt++,"block.left.zz":bt++,"block.right.zz":bt++,"spiral.in":bt++,"spiral.out":bt++,"vert.tl":bt++,"vert.tr":bt++,"vert.bl":bt++,"vert.br":bt++,"fade.left":bt++,"fade.right":bt++,"alt.left":bt++,"alt.right":bt++,"blinds.left":bt++,"blinds.right":bt++,"horz.tl":bt++,"horz.tr":bt++,"horz.bl":bt++,"horz.br":bt++,"fade.top":bt++,"fade.bottom":bt++,"alt.top":bt++,"alt.bottom":bt++,"blinds.top":bt++,"blinds.bottom":bt++,"none":bt++,"fade":bt++,"h.slide":bt++,"v.slide":bt++,"random":bt++
		};
		var bv=
			{
			"fade":0,"down":1,"right":2,"up":3,"left":4,"none":5
		};
		var bw=$(this);
		bw.addClass("sliding-image-gallery");
		bw.css(
			{
			visibility:"visible"
		}
		);
		return this.each(function()
			{
			var a=new SlidingImageGallery($(this),bq);
			a.init()
		}
		);
		function getPosNumber(a,b)
			{
			if(!isNaN(a)&&a>0)
				{
				return a
			}
			return b
		}
		function SlidingImageGallery(h,j)
			{
			var k;
			var l;
			var m;
			var n;
			var o;
			var p;
			var q;
			var r;
			var s=0;
			var t;
			var u;
			var v;
			var w;
			var z;
			var A;
			var B;
			var C;
			var D;
			var E;
			var F;
			var G;
			var H=false;
			var I=false;
			var J=false;
			var K=null;
			var L;
			var M=null;
			var N;
			var O;
			var P;
			var Q=0;
			this.$el=h;
			this.init=function()
				{
				k=h;
				l=h.find(".screen");
				m=h.find(".items");
				n=m.find(">ul:first");
				o=n.find(">li");
				s=o.size();
				P=s-j.buttonDisplayLength;
				N=0;
				O=P;
				if(j.randomize)
					{
					bI()
				}
				p=o.find(".button");
				k.css(
					{
					width:j.width,height:j.height
				}
				);
				H=I=J=false;
				bJ(bu[j.transition]);
				R();
				T();
				if(j.textRollOver)
					{
					k.hover(bP,bQ)
				}
				else
					{
					k.bind(bk,bK)
				}
				if(j.pauseRollOver)
					{
					k.hover(bG,bF)
				}
				var a=k.css("background-color");
				if(J)
					{
					t=new VertStripes(this,br,j.height,getPosNumber(j.verticalSize,bc),a,j.transitionSpeed,getPosNumber(j.verticalStripeDelay,90))
				}
				if(I)
					{
					u=new HorzStripes(this,br,j.height,getPosNumber(j.horizontalSize,bc),a,j.transitionSpeed,getPosNumber(j.horizontalStripeDelay,180))
				}
				if(H)
					{
					v=new Blocks(this,br,j.height,getPosNumber(j.blockSize,bb),a,j.transitionSpeed,getPosNumber(j.blockDelay,35))
				}
				bx(0);
				U()
			};
			var R=function()
				{
				var a="	<div class='preloader'></div>								<div class='timer'></div>							   	<div class='textbox'>							   		<div class='inner-bg'></div>									<div class='inner-text'></div>							   	</div>";
				l.append(a).css(
					{
					width:br,height:j.height
				}
				);
				A=l.find(".preloader");
				B=l.find(".timer").data("pct",1);
				C=l.find(".textbox");
				D=C.find(".inner-bg");
				E=C.find(".inner-text");
				F=$("<div class='strip'></div>");
				S();
				if(j.transition=="h.slide")
					{
					l.append(F);
					F.css(
						{
						width:br*2,height:j.height
					}
					);
					o.removeAttr("effect")
				}
				else if(j.transition=="v.slide")
					{
					l.append(F);
					F.css(
						{
						width:br,height:2*j.height
					}
					);
					o.removeAttr("effect")
				}
				else
					{
					G=$("<a href='#'></a>");
					l.append(G)
				}
			};
			var S=function()
				{
				if(j.showTimer)
					{
					B.css("top",j.timerAlign.toLowerCase()=="top"?0:(j.height-B.height())).css("visibility","visible")
				}
				else
					{
					B.hide()
				}
			};
			var T=function()
				{
				if(j.buttonShowArrow)
					{
					q=$("<div>&nbsp;</div>").attr("id",("arrow-"+j.buttonPosition)).height(j.buttonHeight);
					$(p.get(j.currentItem)).append(q);
					r=q.width()+10
				}
				p.css(
					{
					width:j.buttonWidth,height:(j.buttonHeight-1)
				}
				);
				n.height(s*o.height());
				o.css(
					{
					width:p.width()
				}
				);
				m.css(
					{
					width:o.width()+r,height:j.buttonDisplayLength*o.outerHeight()
				}
				).click(bD);
				w=n.height()-m.height();
				if(j.buttonPosition=="left")
					{
					l.css("left",j.buttonWidth)
				}
				else
					{
					m.css("left",j.width-m.width());
					p.css("left",r);
					l.css("left",0)
				}
				p.each(function()
					{
					var a=$(this).parent();
					var b=$(this).find("p");
					b.css(
						{
						marginTop:(j.buttonHeight-b.outerHeight())/2
					}
					);
					var c=a.find(">a:first").attr("href");
					var d=bu[a.attr("effect")];
					if(d==undefined||d==bu["h.slide"]||d==bu["v.slide"])
						{
						d=bu[j.transition]
					}
					else
						{
						bJ(d)
					}
					a.data(
						{
						imgurl:c,effect:d,delay:getPosNumber(a.attr("delay"),j.delay)
					}
					);
					var e=a.find(">div:hidden").length>0?"block":"none";
					var f=E.outerHeight()-E.height();
					var x=0,y=0,textWidth=0,textHeight=0,color="#FFF",bgcolor="#000",borderradius;
					if(a.find("div:hidden").length>0)
						{
						var g=a.find(">div:hidden");
						textWidth=getPosNumber(parseInt(g.css("width")),br)-f;
						textHeight=getPosNumber(parseInt(g.css("height"))-f,0);
						E.width(textWidth).html(g.html());
						if(textHeight<E.height())
							{
							textHeight=E.height()
						}
						x=g.css("left");
						y=g.css("top");
						textWidth+=f;
						textHeight+=f+1;
						color=g.css("color");
						bgcolor=g.css("background-color");
						borderradius=!isNaN(g.attr("radius"))?parseInt(g.attr("radius")):0
					}
					a.data("textbox",
						{
						display:e,x:x,y:y,w:textWidth,h:textHeight,color:color,bgcolor:bgcolor,borderradius:borderradius
					}
					)
				}
				);
				E.html("").css(
					{
					width:"auto",height:"auto"
				}
				);
				C.css("visibility","visible");
				o.hover(function()
					{
					if(j.currentItem!=$(this).index())
						{
						$(this).find(".button").addClass("over")
					}
				}
				,function()
					{
					$(this).find(".button").removeClass("over")
				}
				);
				switch(j.scrollType)
					{
					case"mouse_click":bS();
					$upPane.click(bW).find("#up-btn").css("cursor","pointer");
					$downPane.click(bX).find("#down-btn").css("cursor","pointer");
					break;
					case"mouse_over":bS();
					$upPane.hover(bZ,cb);
					$downPane.hover(ca,cb);
					break;
					case"mouse_move":m.mousemove(cc);
					break;
					default:j.moveBy1=true;
					o.bind("click",bY)
				}
				if(j.showScrollbar&&w>0)
					{
					bR()
				}
				if(j.autoAdjust)
					{
					k.bind(bj,cf);
					m.hover(function()
						{
						k.unbind(bj)
					}
					,function()
						{
						k.bind(bj,cf)
					}
					)
				}
			};
			var U=function()
				{
				k.trigger(bj);
				if(j.playOnce)
					{
					bH()
				}
				if(j.oldItem>=0)
					{
					var a=$(o.get(j.oldItem));
					var b=a.find(".selected");
					b.removeClass("selected").removeClass("selected-"+j.buttonPosition);
					b.css(
						{
						width:j.buttonWidth
					}
					)
				}
				var c=$(o.get(j.currentItem));
				var d=c.find(".button");
				d.removeClass("over").addClass("selected").addClass("selected-"+j.buttonPosition).append(q);
				d.css(
					{
					width:j.buttonWidth+r
				}
				);
				L=c.data("delay");
				bL();
				if(!j.textSync)
					{
					k.trigger(bk)
				}
				if(G)
					{
					var e=$(c.find(">a").get(1));
					var f=e.attr("href");
					if(f)
						{
						G.unbind("click",false).css("cursor","pointer").attr(
							{
							href:f,target:e.attr("target")
						}
						)
					}
					else
						{
						G.click(false).css("cursor","default")
					}
				}
				if(c.data("img"))
					{
					A.hide();
					V(c.data("img"))
				}
				else
					{
					var g=$("<img class='main-img'/>");
					g.load(function()
						{
						A.hide();
						by(c,$(this));
						V($(this))
					}
					).error(function()
						{
						alert("Error loading image!")
					}
					);
					A.show();
					g.attr("src",c.data("imgurl"))
				}
			};
			var V=function(a)
				{
				if(J)
					{
					t.clear();
					W()
				}
				if(I)
					{
					u.clear();
					W()
				}
				if(H)
					{
					v.clear();
					W()
				}
				var b=$(o.get(j.currentItem)).data("effect");
				if(b==bu["none"]||b==undefined)
					{
					X(a);
					return
				}
				else if(b==bu["fade"])
					{
					Y(a);
					return
				}
				else if(b==bu["h.slide"])
					{
					Z(a,"left",br);
					return
				}
				else if(b==bu["v.slide"])
					{
					Z(a,"top",j.height);
					return
				}
				if(b==bu["random"])
					{
					b=Math.floor(Math.random()*(bt-5))
				}
				if(b<=bu["spiral.out"])
					{
					v.displayContent(a,b)
				}
				else if(b<=bu["blinds.right"])
					{
					t.displayContent(a,b)
				}
				else
					{
					u.displayContent(a,b)
				}
			};
			var W=function()
				{
				if(j.oldItem>=0)
					{
					var a=G.find("img#curr-img").attr("src");
					var b=$(o.get(j.oldItem)).data("imgurl");
					if(a!=b)
						{
						G.find("img.main-img").attr("id","").hide();
						var c=G.find("img.main-img").filter(function()
							{
							return $(this).attr("src")==b
						}
						);
						$(c.get(0)).show()
					}
				}
			};
			var X=function(a)
				{
				if(j.textSync)
					{
					k.trigger(bk)
				}
				G.find("img.main-img").attr("id","").hide();
				a.attr("id","curr-img").show();
				bA()
			};
			var Y=function(a)
				{
				G.find("img#curr-img").stop(true,true);
				G.find("img.main-img").attr("id","").css("z-index",0);
				a.attr("id","curr-img").stop(true,true).css(
					{
					opacity:0,"z-index":1
				}
				).show().animate(
					{
					opacity:1
				}
				,j.transitionSpeed,j.easing,function()
					{
					G.find("img.main-img:not('#curr-img')").hide();
					if(j.textSync)
						{
						k.trigger(bk)
					}
					bA()
				}
				)
			};
			var Z=function(a,b,c)
				{
				F.stop(true,true);
				var d=$("#curr-img",F);
				if(d.size()>0)
					{
					F.find(".main-img").attr("id","").parents(".content-box").css(
						{
						top:0,left:0
					}
					);
					a.attr("id","curr-img").parents(".content-box").show();
					var e,z;
					if(j.button=="previous")
						{
						F.css(b,-c);
						e=d;
						z=0
					}
					else
						{
						e=a;
						z=-c
					}
					e.parents(".content-box").css(b,c);
					var f=(b=="top")?
						{
						top:z
					}
					:
						{
						left:z
					};
					F.stop(true,true).animate(f,j.transitionSpeed,j.easing,function()
						{
						F.find(".main-img:not('#curr-img')").parents(".content-box").hide();
						e.parents(".content-box").css(
							{
							top:0,left:0
						}
						);
						F.css(
							{
							top:0,left:0
						}
						);
						if(j.textSync)
							{
							k.trigger(bk)
						}
						bA()
					}
					)
				}
				else
					{
					F.css(
						{
						top:0,left:0
					}
					);
					F.find(".main-img").parents(".content-box").hide().css(
						{
						top:0,left:0
					}
					);
					a.attr("id","curr-img").parents(".content-box").show();
					if(j.textSync)
						{
						k.trigger(bk)
					}
					bA()
				}
			};
			var bx=function(i)
				{
				try
					{
					var a=$(o.get(i));
					var b=$("<img class='main-img'/>");
					b.load(function()
						{
						if(!a.data("img"))
							{
							by(a,$(this))
						}
						i++;
						if(i<s)
							{
							bx(i)
						}
					}
					).error(function()
						{
						i++;
						if(i<s)
							{
							bx(i)
						}
					}
					);
					b.attr("src",a.data("imgurl"))
				}
				catch(ex)
					{
				}
			};
			var by=function(a,b)
				{
				if(j.transition=="h.slide"||j.transition=="v.slide")
					{
					F.append(b);
					bz(b);
					var c=$("<div class='content-box'></div>").css(
						{
						width:br,height:j.height
					}
					);
					b.wrap(c);
					b.css("display","block");
					var d=$(a.find(">a").get(1));
					if(d)
						{
						b.wrap(d)
					}
				}
				else
					{
					G.append(b);
					bz(b)
				}
				a.data("img",b)
			};
			var bz=function(a)
				{
				if(j.autoCenter&&a.width()>0&&a.height()>0)
					{
					var b=(j.height-a.height())/2;
					var c=(br-a.width())/2;
					var d=0,left=0,vPad=0,hPad=0;
					if(b>0)
						{
						vPad=b
					}
					else if(b<0)
						{
						d=b
					}
					if(c>0)
						{
						hPad=c
					}
					else if(c<0)
						{
						left=c
					}
					a.css(
						{
						top:d,left:left,"padding-top":vPad,"padding-bottom":vPad,"padding-left":hPad,"padding-right":hPad
					}
					)
				}
			};
			var bA=function()
				{
				if(j.autoPlay&&K==null)
					{
					var a=Math.round(B.data("pct")*L);
					B.animate(
						{
						width:(br+1)
					}
					,a,"linear");
					K=setTimeout(bE,a)
				}
			};
			var bB=function()
				{
				clearTimeout(K);
				K=null;
				B.stop(true).width(0).data("pct",1)
			};
			var bC=function()
				{
				clearTimeout(K);
				K=null;
				B.stop(true).data("pct",1-(B.width()/(br+1)))
			};
			var bD=function(e)
				{
				var a=$(e.target);
				if(a[0].nodeName!="LI")
					{
					a=a.parents("li").eq(0)
				}
				var i=a.index();
				if(i>=0&&i!=j.currentItem)
					{
					j.button=i<j.currentItem?"previous":"next";
					bB();
					j.oldItem=j.currentItem;
					j.currentItem=i;
					U()
				}
				return false
			};
			var bE=function()
				{
				bB();
				j.button="next";
				j.oldItem=j.currentItem;
				j.currentItem=j.currentItem<s-1?j.currentItem+1:0;
				U()
			};
			var bF=function()
				{
				j.autoPlay=true;
				bA()
			};
			var bG=function()
				{
				j.autoPlay=false;
				bC()
			};
			var bH=function()
				{
				if(j.currentItem==(s-1))
					{
					j.autoPlay=false;
					bC()
				}
			};
			var bI=function()
				{
				var a=new Array(s);
				var i=0;
				for(i=0;
				i<s;
				i++)
					{
					a[i]=$(o.get(i)).clone(true)
				}
				for(i=0;
				i<s;
				i++)
					{
					var b=Math.floor(Math.random()*s);
					var c=a[i];
					a[i]=a[b];
					a[b]=c
				}
				for(i=0;
				i<s;
				i++)
					{
					$(o.get(i)).replaceWith(a[i])
				}
				o=n.find(">li")
			};
			var bJ=function(a)
				{
				if(a==bu["random"])
					{
					H=I=J=true
				}
				else if(a<=bu["spiral.out"])
					{
					H=true
				}
				else if(a<=bu["blinds.right"])
					{
					J=true
				}
				else if(a<=bu["blinds.bottom"])
					{
					I=true
				}
			};
			var bK=function(e)
				{
				if(!C.data("visible"))
					{
					C.data("visible",true);
					var a=$(o.get(j.currentItem));
					if(a.find(">div:hidden").length>0)
						{
						var b=a.find(">div:hidden").html();
						var c=$(o.get(j.currentItem)).data("textbox");
						D.css(
							{
							"background-color":c.bgcolor,height:c.h-1,MozBorderRadius:c.borderradius,WebkitBorderRadius:c.borderradius,borderRadius:c.borderradius
						}
						);
						E.css("color",c.color);
						switch(bv[j.textEffect])
							{
							case bv["fade"]:bM(b,c);
							break;
							case bv["down"]:bN(b,c,
								{
								width:c.w,height:0
							}
							,
								{
								height:c.h
							}
							);
							break;
							case bv["right"]:bN(b,c,
								{
								width:0,height:c.h
							}
							,
								{
								width:c.w
							}
							);
							break;
							case bv["left"]:bN(b,c,
								{
								"margin-left":c.w,width:0,height:c.h
							}
							,
								{
								width:c.w,"margin-left":0
							}
							);
							break;
							case bv["up"]:bN(b,c,
								{
								"margin-top":c.h,height:0,width:c.w
							}
							,
								{
								height:c.h,"margin-top":0
							}
							);
							break;
							default:bO(b,c)
						}
					}
				}
			};
			var bL=function()
				{
				C.data("visible",false).stop(true,true);
				switch(bv[j.textEffect])
					{
					case bv["fade"]:case bv["down"]:case bv["left"]:case bv["up"]:case bv["right"]:if(jQuery.browser.msie)
						{
						E.css("opacity",0)
					}
					C.fadeOut(bg,function()
						{
						$(this).css("display","none")
					}
					);
					break;
					default:C.css("display","none")
				}
			};
			var bM=function(a,b)
				{
				E.css("opacity",1).html(a);
				C.css(
					{
					left:b.x,top:b.y,width:b.w,height:b.h
				}
				).stop(true,true).fadeIn(bg,function()
					{
					if(jQuery.browser.msie)
						{
						E[0].style.removeAttribute('filter')
					}
				}
				)
			};
			var bN=function(a,b,c,d)
				{
				E.css("opacity",1).html("");
				C.stop(true,true).css(
					{
					display:b.display,top:b.y,left:b.x,"margin-top":0,"margin-left":0
				}
				).css(c).animate(d,bg,function()
					{
					E.html(a)
				}
				)
			};
			var bO=function(a,b)
				{
				C.stop(true).css(
					{
					display:b.display,left:b.x,top:b.y,width:b.w,height:b.h
				}
				);
				E.html(a)
			};
			var bP=function()
				{
				k.unbind(bk).bind(bk,bK).trigger(bk)
			};
			var bQ=function()
				{
				k.unbind(bk);
				bL()
			};
			var bR=function()
				{
				m.append("<div id='scrollbar'><div id='knob'></div></div>");
				$scrollbar=m.find("#scrollbar");
				$knob=$scrollbar.find("#knob");
				$scrollbar.css("left",j.buttonPosition=="left"?0:m.width()-$scrollbar.width());
				$knob.height(Math.floor((j.buttonDisplayLength/s)*$scrollbar.height()));
				var a=$scrollbar.height()-$knob.height();
				var b=a/w;
				$scrollbar.data(
					{
					range:a,ratio:b
				}
				);
				k.bind(bm,function()
					{
					$scrollbar.stop(true,true).fadeIn(bf)
				}
				).bind(bn,function()
					{
					$scrollbar.stop(true,true).fadeOut(bf)
				}
				).bind(bo,function()
					{
					$knob.stop(true).animate(
						{
						top:Math.round(-Q*b)
					}
					,scrollSpeed)
				}
				);
				$scrollbar.hide().css("visibility","visible")
			};
			var bS=function()
				{
				m.append("	<div class='btn-pane'><div id='up-btn'></div></div>								<div class='btn-pane'><div id='down-btn'></div></div>");
				var a=m.find(".btn-pane");
				a.css(
					{
					opacity:0,width:j.buttonWidth
				}
				);
				a.hover(bT,bU);
				if(j.buttonShowArrow&&j.buttonPosition=="right")
					{
					a.css("left",q.width())
				}
				$upPane=a.has("#up-btn");
				$downPane=a.has("#down-btn");
				$downPane.css("top",m.height()-$downPane.height());
				a.css("visibility","visible");
				k.bind(bl,bV).trigger(bl)
			};
			var bT=function()
				{
				$(this).stop(true,true).animate(
					{
					opacity:1
				}
				,bf)
			};
			var bU=function()
				{
				$(this).stop(true,true).animate(
					{
					opacity:0
				}
				,bf)
			};
			var bV=function()
				{
				Q<0?$upPane.stop(true,true).fadeIn(bf):$upPane.stop(true,true).fadeOut(bf);
				Q>-w?$downPane.stop(true,true).fadeIn(bf):$downPane.stop(true,true).fadeOut(bf)
			};
			var bW=function()
				{
				if(O<P)
					{
					var a=j.moveBy1?1:Math.min(P-O,j.buttonDisplayLength);
					O+=a;
					N-=a;
					cg()
				}
				return false
			};
			var bX=function()
				{
				if(N<P)
					{
					var a=j.moveBy1?1:Math.min(P-N,j.buttonDisplayLength);
					N+=a;
					O-=a;
					cg()
				}
				return false
			};
			var bY=function()
				{
				var a=($(this).index()-N)%j.buttonDisplayLength;
				if(a+1==j.buttonDisplayLength)
					{
					bX()
				}
				else if(inde==0)
					{
					bW()
				}
			};
			var bZ=function()
				{
				$downPane.stop(true,true).fadeIn(bf);
				k.trigger(bm);
				scrollSpeed=-n.stop(true).position().top*bs;
				n.animate(
					{
					top:0
				}
				,scrollSpeed,function()
					{
					$upPane.stop(true,true).fadeOut(bf);
					k.trigger(bn)
				}
				);
				$knob.stop(true).animate(
					{
					top:0
				}
				,scrollSpeed)
			};
			var ca=function()
				{
				$upPane.stop(true,true).fadeIn(bf);
				k.trigger(bm);
				scrollSpeed=(w+n.stop(true).position().top)*bs;
				n.animate(
					{
					top:-w
				}
				,scrollSpeed,function()
					{
					$downPane.stop(true,true).fadeOut(bf);
					k.trigger(bn)
				}
				);
				$knob.stop(true).animate(
					{
					top:$scrollbar.data("range")
				}
				,scrollSpeed)
			};
			var cb=function()
				{
				n.stop(true);
				try
					{
					$knob.stop(true)
				}
				catch(ex)
					{
				};
				k.trigger(bn)
			};
			var cc=function(e)
				{
				var a=Math.round(((e.pageY-m.offset().top)/m.height())*100)/100;
				z=-Math.round(w*a);
				if(M==null&&z!=n.position().top)
					{
					cb();
					k.trigger(bm);
					M=setInterval(cd,30)
				}
			};
			var cd=function()
				{
				var a=n.stop(true).position().top;
				if(a==z)
					{
					ce();
					k.trigger(bn)
				}
				else
					{
					var b=(z-a)*bh;
					Q+=b<0?Math.min(-1,Math.round(b)):Math.max(1,Math.round(b));
					n.css("top",Q);
					try
						{
						$knob.css("top",Math.round(-Q*$scrollbar.data("ratio")))
					}
					catch(ex)
						{
					}
				}
			};
			var ce=function()
				{
				clearInterval(M);
				M=null
			};
			var cf=function()
				{
				if(M==null)
					{
					var a=Math.min(j.currentItem,P);
					N=a;
					O=P-N;
					cg()
				}
			};
			var cg=function()
				{
				Q=-N*o.outerHeight();
				scrollSpeed=Math.min(bi,Math.abs(n.position().top-Q)*bs);
				if(scrollSpeed>0)
					{
					k.trigger(bm)
				}
				n.stop(true).animate(
					{
					top:Q
				}
				,scrollSpeed,function()
					{
					k.trigger(bl);
					k.trigger(bn)
				}
				);
				k.trigger(bo)
			};
			this.setComplete=function(a)
				{
				X(a)
			};
			this.addToScreen=function(a)
				{
				G.append(a)
			};
			this.autoCenter=function()
				{
				return j.autoCenter
			};
			this.easing=function()
				{
				return j.easing
			}
		}
		function randomizeArray(a)
			{
			var b=a.length;
			for(var i=0;
			i<b;
			i++)
				{
				var c=Math.floor(Math.random()*b);
				var d=a[i];
				a[i]=a[c];
				a[c]=d
			}
		}
		function VertStripes(k,l,m,o,p,q,r)
			{
			var s;
			var t;
			var u;
			var v=null;
			var w=function()
				{
				u=Math.ceil(l/o);
				if(u>ba)
					{
					o=Math.ceil(l/ba);
					u=Math.ceil(l/o)
				}
				var a="";
				for(var i=0;
				i<u;
				i++)
					{
					a+="<div class='vpiece' id='"+i+"'></div>"
				}
				k.addToScreen(a);
				s=k.$el.find("div.vpiece");
				t=new Array(u);
				s.each(function(n)
					{
					$(this).css(
						{
						left:(n*o),height:m
					}
					);
					t[n]=$(this)
				}
				)
			};
			this.clear=function()
				{
				clearInterval(v);
				s.stop(true).css(
					{
					"z-index":2,opacity:0
				}
				)
			};
			this.displayContent=function(a,b)
				{
				x(a,b);
				z(a,b)
			};
			var x=function(a,b)
				{
				switch(b)
					{
					case bu["vert.tl"]:case bu["vert.tr"]:y(a,-m,1,o,false);
					break;
					case bu["vert.bl"]:case bu["vert.br"]:y(a,m,1,o,false);
					break;
					case bu["alt.left"]:case bu["alt.right"]:y(a,0,1,o,true);
					break;
					case bu["blinds.left"]:case bu["blinds.right"]:y(a,0,1,0,false);
					break;
					default:y(a,0,0,o,false)
				}
			};
			var y=function(a,b,c,d,e)
				{
				var f=a.attr("src");
				var g=0;
				var h=0;
				if(k.autoCenter())
					{
					g=(m-a.height())/2;
					h=(l-a.width())/2
				}
				for(var i=0;
				i<u;
				i++)
					{
					var j=((-i*o)+h);
					if(e)
						{
						b=(i%2)==0?-m:m
					}
					$(s.get(i)).css(
						{
						background:p+" url('"+f+"') no-repeat",backgroundPosition:j+"px "+g+"px",opacity:c,top:b,width:d,"z-index":3
					}
					)
				}
			};
			var z=function(a,b)
				{
				var c,end,incr,limit;
				switch(b)
					{
					case bu["vert.tl"]:case bu["vert.bl"]:case bu["fade.left"]:case bu["blinds.left"]:case bu["alt.left"]:c=0;
					end=u-1;
					incr=1;
					break;
					default:c=u-1;
					end=0;
					incr=-1
				}
				v=setInterval(function()
					{
					$(s.get(c)).animate(
						{
						top:0,opacity:1,width:o
					}
					,q,k.easing(),function()
						{
						if($(this).attr("id")==end)
							{
							k.setComplete(a)
						}
					}
					);
					if(c==end)
						{
						clearInterval(v)
					}
					c+=incr
				}
				,r)
			};
			w()
		}
		function HorzStripes(k,l,m,o,p,q,r)
			{
			var s;
			var t;
			var u;
			var v=null;
			var w=function()
				{
				u=Math.ceil(m/o);
				if(u>ba)
					{
					o=Math.ceil(m/ba);
					u=Math.ceil(m/o)
				}
				var a="";
				for(var j=0;
				j<u;
				j++)
					{
					a+="<div class='hpiece' id='"+j+"'><!-- --></div>"
				}
				k.addToScreen(a);
				s=k.$el.find("div.hpiece");
				t=new Array(u);
				s.each(function(n)
					{
					$(this).css(
						{
						top:(n*o),width:l
					}
					);
					t[n]=$(this)
				}
				)
			};
			this.clear=function()
				{
				clearInterval(v);
				s.stop(true).css(
					{
					"z-index":2,opacity:0
				}
				)
			};
			this.displayContent=function(a,b)
				{
				x(a,b);
				z(a,b)
			};
			var x=function(a,b)
				{
				switch(b)
					{
					case bu["horz.tr"]:case bu["horz.br"]:y(a,l,1,o,false);
					break;
					case bu["horz.tl"]:case bu["horz.bl"]:y(a,-l,1,o,false);
					break;
					case bu["alt.top"]:case bu["alt.bottom"]:y(a,0,1,o,true);
					break;
					case bu["blinds.top"]:case bu["blinds.bottom"]:y(a,0,1,0,false);
					break;
					default:y(a,0,0,o,false)
				}
			};
			var y=function(a,b,c,d,e)
				{
				var f=a.attr("src");
				var g=0;
				var h=0;
				if(k.autoCenter())
					{
					g=(m-a.height())/2;
					h=(l-a.width())/2
				}
				for(var i=0;
				i<u;
				i++)
					{
					var j=((-i*o)+g);
					if(e)
						{
						b=(i%2)==0?-l:l
					}
					$(s.get(i)).css(
						{
						background:p+" url('"+f+"') no-repeat",backgroundPosition:h+"px "+j+"px",opacity:c,left:b,height:d,"z-index":3
					}
					)
				}
			};
			var z=function(a,b)
				{
				var c,end,incr;
				switch(b)
					{
					case bu["horz.tl"]:case bu["horz.tr"]:case bu["fade.top"]:case bu["blinds.top"]:case bu["alt.top"]:c=0;
					end=u-1;
					incr=1;
					break;
					default:c=u-1;
					end=0;
					incr=-1
				}
				v=setInterval(function()
					{
					$(s.get(c)).animate(
						{
						left:0,opacity:1,height:o
					}
					,q,k.easing(),function()
						{
						if($(this).attr("id")==end)
							{
							k.setComplete(a)
						}
					}
					);
					if(c==end)
						{
						clearInterval(v)
					}
					c+=incr
				}
				,r)
			};
			w()
		}
		function Blocks(n,o,p,q,r,s,t)
			{
			var u;
			var v;
			var w;
			var x;
			var y;
			var z;
			var A;
			var B=function()
				{
				x=Math.ceil(p/q);
				y=Math.ceil(o/q);
				z=x*y;
				if(z>ba)
					{
					q=Math.ceil(Math.sqrt((p*o)/ba));
					x=Math.ceil(p/q);
					y=Math.ceil(o/q);
					z=x*y
				}
				var a="";
				for(var i=0;
				i<x;
				i++)
					{
					for(var j=0;
					j<y;
					j++)
						{
						a+="<div class='block' id='"+i+"-"+j+"'></div>"
					}
				}
				n.addToScreen(a);
				v=n.$el.find("div.block");
				v.data(
					{
					tlId:"0-0",trId:"0-"+(y-1),blId:(x-1)+"-0",brId:(x-1)+"-"+(y-1)
				}
				);
				var k=0;
				w=new Array(z);
				u=new Array(x);
				for(var i=0;
				i<x;
				i++)
					{
					u[i]=new Array(y);
					for(var j=0;
					j<y;
					j++)
						{
						u[i][j]=w[k++]=v.filter("#"+(i+"-"+j)).data("top",i*q)
					}
				}
			};
			this.clear=function()
				{
				clearInterval(A);
				v.stop(true).css(
					{
					"z-index":2,opacity:0
				}
				)
			};
			this.displayContent=function(a,b)
				{
				switch(b)
					{
					case bu["diag.fade"]:C(a,0,q,0);
					D(a,
						{
						opacity:1
					}
					,false);
					break;
					case bu["diag.exp"]:C(a,0,0,0);
					D(a,
						{
						opacity:1,width:q,height:q
					}
					,false);
					break;
					case bu["rev.diag.fade"]:C(a,0,q,0);
					D(a,
						{
						opacity:1
					}
					,true);
					break;
					case bu["rev.diag.exp"]:C(a,0,0,0);
					D(a,
						{
						opacity:1,width:q,height:q
					}
					,true);
					break;
					case bu["block.fade"]:C(a,0,q,0);
					H(a);
					break;
					case bu["block.exp"]:C(a,1,0,0);
					H(a);
					break;
					case bu["block.drop"]:C(a,1,q,-(x*q));
					H(a);
					break;
					case bu["block.top.zz"]:case bu["block.bottom.zz"]:C(a,0,q,0);
					F(a,b);
					break;
					case bu["block.left.zz"]:case bu["block.right.zz"]:C(a,0,q,0);
					E(a,b);
					break;
					case bu["spiral.in"]:C(a,0,q,0);
					I(a,false);
					break;
					case bu["spiral.out"]:C(a,0,q,0);
					I(a,true);
					break;
					default:C(a,1,0,0);
					G(a,b)
				}
			};
			var C=function(a,b,c,d)
				{
				var e=0;
				var f=0;
				if(n.autoCenter())
					{
					e=(p-a.height())/2;
					f=(o-a.width())/2
				}
				var g=a.attr("src");
				for(var i=0;
				i<x;
				i++)
					{
					for(var j=0;
					j<y;
					j++)
						{
						var h=((-i*q)+e);
						var k=((-j*q)+f);
						u[i][j].css(
							{
							background:r+" url('"+g+"') no-repeat",backgroundPosition:k+"px "+h+"px",opacity:b,top:(i*q)+d,left:(j*q),width:c,height:c,"z-index":3
						}
						)
					}
				}
			};
			var D=function(a,b,c)
				{
				var d=new Array(z);
				var e,end,incr,lastId;
				var f=(x-1)+(y-1);
				if(c)
					{
					e=f;
					end=-1;
					incr=-1;
					lastId=v.data("tlId")
				}
				else
					{
					e=0;
					end=f+1;
					incr=1;
					lastId=v.data("brId")
				}
				var g=0;
				while(e!=end)
					{
					i=Math.min(x-1,e);
					while(i>=0)
						{
						j=Math.abs(i-e);
						if(j>=y)
							{
							break
						}
						d[g++]=u[i][j];
						i--
					}
					e+=incr
				}
				g=0;
				A=setInterval(function()
					{
					d[g++].animate(b,s,n.easing(),function()
						{
						if($(this).attr("id")==lastId)
							{
							n.setComplete(a)
						}
					}
					);
					if(g==z)
						{
						clearInterval(A)
					}
				}
				,t)
			};
			var E=function(a,b)
				{
				var c=true;
				var i=0,j,incr,lastId;
				if(b==bu["block.left.zz"])
					{
					lastId=(y%2==0)?v.data("trId"):v.data("brId");
					j=0;
					incr=1
				}
				else
					{
					lastId=(y%2==0)?v.data("tlId"):v.data("blId");
					j=y-1;
					incr=-1
				}
				A=setInterval(function()
					{
					u[i][j].animate(
						{
						opacity:1
					}
					,s,n.easing(),function()
						{
						if($(this).attr("id")==lastId)
							{
							n.setComplete(a)
						}
					}
					);
					if(u[i][j].attr("id")==lastId)
						{
						clearInterval(A)
					}
					(c?i++:i--);
					if(i==x||i<0)
						{
						c=!c;
						i=(c?0:x-1);
						j+=incr
					}
				}
				,t)
			};
			var F=function(a,b)
				{
				var c=true;
				var i,j=0,incr,lastId;
				if(b==bu["block.top.zz"])
					{
					lastId=(x%2==0)?v.data("blId"):v.data("brId");
					i=0;
					incr=1
				}
				else
					{
					lastId=(x%2==0)?v.data("tlId"):v.data("trId");
					i=x-1;
					incr=-1
				}
				A=setInterval(function()
					{
					u[i][j].animate(
						{
						opacity:1
					}
					,s,n.easing(),function()
						{
						if($(this).attr("id")==lastId)
							{
							n.setComplete(a)
						}
					}
					);
					if(u[i][j].attr("id")==lastId)
						{
						clearInterval(A)
					}
					(c?j++:j--);
					if(j==y||j<0)
						{
						c=!c;
						j=(c?0:y-1);
						i+=incr
					}
				}
				,t)
			};
			var G=function(a,b)
				{
				var c=new Array(z);
				var d;
				var e=0;
				switch(b)
					{
					case bu["block.left"]:d=v.data("brId");
					for(var j=0;
					j<y;
					j++)
						{
						for(var i=0;
						i<x;
						i++)
							{
							c[e++]=u[i][j]
						}
					}
					break;
					case bu["block.right"]:d=v.data("blId");
					for(var j=y-1;
					j>=0;
					j--)
						{
						for(var i=0;
						i<x;
						i++)
							{
							c[e++]=u[i][j]
						}
					}
					break;
					case bu["block.top"]:d=v.data("brId");
					for(var i=0;
					i<x;
					i++)
						{
						for(var j=0;
						j<y;
						j++)
							{
							c[e++]=u[i][j]
						}
					}
					break;
					default:d=v.data("trId");
					for(var i=x-1;
					i>=0;
					i--)
						{
						for(var j=0;
						j<y;
						j++)
							{
							c[e++]=u[i][j]
						}
					}
				}
				e=0;
				A=setInterval(function()
					{
					c[e++].animate(
						{
						width:q,height:q
					}
					,s,n.easing(),function()
						{
						if($(this).attr("id")==d)
							{
							n.setComplete(a)
						}
					}
					);
					if(e==z)
						{
						clearInterval(A)
					}
				}
				,t)
			};
			var H=function(a)
				{
				randomizeArray(w);
				var i=0;
				count=0;
				A=setInterval(function()
					{
					w[i].animate(
						{
						top:w[i].data("top"),width:q,height:q,opacity:1
					}
					,s,n.easing(),function()
						{
						if(++count==z)
							{
							n.setComplete(a)
						}
					}
					);
					i++;
					if(i==z)
						{
						clearInterval(A)
					}
				}
				,t)
			};
			var I=function(a,b)
				{
				var i=0,j=0;
				var c=x-1;
				var d=y-1;
				var e=0;
				var f=d;
				var g=new Array();
				while(c>=0&&d>=0)
					{
					var h=0;
					while(true)
						{
						g[g.length]=u[i][j];
						if((++h)>f)
							{
							break
						}
						switch(e)
							{
							case 0:j++;
							break;
							case 1:i++;
							break;
							case 2:j--;
							break;
							case 3:i--
						}
					}
					switch(e)
						{
						case 0:e=1;
						f=(--c);
						i++;
						break;
						case 1:e=2;
						f=(--d);
						j--;
						break;
						case 2:e=3;
						f=(--c);
						i--;
						break;
						case 3:e=0;
						f=(--d);
						j++
					}
				}
				if(g.length>0)
					{
					if(b)
						{
						g.reverse()
					}
					var l=g.length-1;
					var m=g[l].attr("id");
					var k=0;
					A=setInterval(function()
						{
						g[k].animate(
							{
							opacity:1
						}
						,s,n.easing(),function()
							{
							if($(this).attr("id")==m)
								{
								n.setComplete(a)
							}
						}
						);
						if(k==l)
							{
							clearInterval(A)
						}
						k++
					}
					,t)
				}
			};
			B()
		}
	}
}
)(jQuery);
