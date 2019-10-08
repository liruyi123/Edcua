@extends('index.ments')
<link rel="stylesheet" href="css/course.css"/>
<script src="js/jquery-1.8.0.min.js"></script>
<link rel="stylesheet" href="css/tab.css" media="screen">
<script src="js/jquery.tabs.js"></script>
<script src="js/mine.js"></script>
@section('content')
    <div class="main-container">
    <script src="/index/js/init.js"></script>
    <script src="/index/js/home.js"></script>
    <link rel="stylesheet" href="/index/css/style2.css"/>
    <link rel="stylesheet" href="/index/css/ui.css"/>
        <div class="uk-grid">
            <div class="uk-width-1-4">
                <div class="pb pb-category">
                    <div class="body">
                        <a class="title" href="javascript:;"><i class="uk-icon-circle-o"></i> 职业方向</a>
                    <div class="title-box">
                        <a href="/question/list/1">Java工程师</a>
                        <a href="/question/list/2">C++工程师</a>
                        <a href="/question/list/3">安卓工程师</a>
                        <a href="/question/list/5">iOS工程师</a>
                        <a href="/question/list/6">运维工程师</a>
                        <a href="/question/list/7">前端工程师</a>
                        <a href="/question/list/8">算法工程师</a>
                        <a href="/question/list/9">PHP工程师</a>
                    </div>
                        <a class="title" href="javascript:;"><i class="uk-icon-circle-o"></i> 编程语言</a>
                    <div class="title-box">
                        <a href="/question/list/10">C/C++</a>
                        <a href="/question/list/11">Java</a>
                        <a href="/question/list/36">Javascript</a>
                        <a href="/question/list/37">C#</a>
                        <a href="/question/list/38">Python</a>
                        <a href="/question/list/39">HTML/CSS</a>
                        <a href="/question/list/40">PHP</a>
                        <a href="/question/list/41">小众语言</a>
                    </div>
                        <a class="title" href="javascript:;"><i class="uk-icon-circle-o"></i> 软件开发</a>
                    <div class="title-box">
                        <a href="/question/list/52">软件工程</a>
                        <a href="/question/list/53">软件测试</a>
                        <a href="/question/list/54">面向对象</a>
                        <a href="/question/list/55">海量数据</a>
                        <a href="/question/list/56">iOS</a>
                        <a href="/question/list/57">Android</a>
                        <a href="/question/list/58">Linux</a>
                        <a href="/question/list/59">.NET</a>
                        <a href="/question/list/60">Windows</a>
                        <a href="/question/list/61">分布式</a>
                        <a href="/question/list/62">系统设计</a>
                        <a href="/question/list/63">开发工具</a>
                        <a href="/question/list/64">Jquery</a>
                        <a href="/question/list/65">Struts</a>
                        <a href="/question/list/66">Hibernate</a>
                        <a href="/question/list/67">Redis</a>
                        <a href="/question/list/68">WebServer</a>
                        <a href="/question/list/69">Hadoop/Spark</a>
                        <a href="/question/list/70">数据统计</a>
                        <a href="/question/list/71">机器学习</a>
                        <a href="/question/list/72">推荐</a>
                    </div>
                        <a class="title" href="javascript:;"><i class="uk-icon-circle-o"></i> 计算机基础</a>
                    <div class="title-box">
                        <a href="/question/list/73">网络基础</a>
                        <a href="/question/list/74">正则表达式</a>
                        <a href="/question/list/75">数据库</a>
                        <a href="/question/list/76">操作系统</a>
                        <a href="/question/list/77">加密与安全</a>
                        <a href="/question/list/78">编程基础</a>
                        <a href="/question/list/79">编译和体系结构</a>
                    </div>
                        <a class="title" href="javascript:;"><i class="uk-icon-circle-o"></i> 数据结构</a>
                    <div class="title-box">
                        <a href="/question/list/83">数组</a>
                        <a href="/question/list/84">字符串</a>
                        <a href="/question/list/85">链表</a>
                        <a href="/question/list/86">栈</a>
                        <a href="/question/list/87">队列</a>
                        <a href="/question/list/88">树</a>
                        <a href="/question/list/89">图</a>
                        <a href="/question/list/90">哈希</a>
                        <a href="/question/list/91">堆</a>
                        <a href="/question/list/92">高级数组</a>
                    </div>
                        <a class="title" href="javascript:;"><i class="uk-icon-circle-o"></i> 公司</a>
                    <div class="title-box">
                        <a href="/question/list/93">阿里巴巴</a>
                        <a href="/question/list/94">金山</a>
                        <a href="/question/list/95">迅雷</a>
                        <a href="/question/list/96">赶集网</a>
                        <a href="/question/list/97">艺龙网</a>
                        <a href="/question/list/98">腾讯</a>
                        <a href="/question/list/99">美团</a>
                        <a href="/question/list/100">网易</a>
                        <a href="/question/list/101"> 盛大</a>
                        <a href="/question/list/102">百度</a>
                        <a href="/question/list/103">爱奇艺</a>
                        <a href="/question/list/104">淘宝</a>
                        <a href="/question/list/105">携程</a>
                        <a href="/question/list/106">搜狐</a>
                        <a href="/question/list/107">微软</a>
                        <a href="/question/list/108">当当网</a>
                        <a href="/question/list/109">去哪儿</a>
                        <a href="/question/list/110">google</a>
                        <a href="/question/list/111">华为</a>
                        <a href="/question/list/112">雅虎</a>
                        <a href="/question/list/113">京东</a>
                        <a href="/question/list/114">乐视网</a>
                        <a href="/question/list/115">大众点评</a>
                        <a href="/question/list/116">小米</a>
                        <a href="/question/list/117">巨人网络</a>
                        <a href="/question/list/118">完美世界</a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="uk-width-3-4">
                <div class="pb">
                    <div class="body">
                        <div class="pb-search-home">
                            <input type="text" placeholder="搜索 题目/试卷" id="keyword" onkeypress="if(event.keyCode==13){window.location.href='/search?keywords='+window.api.util.urlencode($('#keyword').val());}" />
                            <a href="javascript:;" onclick="window.location.href='/search?keywords='+window.api.util.urlencode($('#keyword').val());"><span class="uk-icon-search"></span> 搜索</a>
                        </div>
                    </div>
                </div>
                
                <div class="pb pb-question-list">
                    <div class="head">
                        <h2>最新题目</h2>
                    </div>
                    <div class="body">
                        <div class="empty" style="display:none;">
                            暂无记录
                        </div>
                        <div class="item">
                            <div class="title">
                                <a href="/question/view/fbmpv8mhoxjzg6ls">
                                    [判断题]
                                    自然生长的菊花一般在秋冬季节开放。
                                </a>
                            </div>
                        <div class="tags">
                            <div class="right">
                                <span>正确率 81%</span>
                                |
                                <span>评论 1</span>
                                |
                                <span>点击 370</span>
                            </div>
                                <a href="/question/list/1" target="_blank">Java工程师</a></div>
                            </div>
                            <div class="item">
                                <div class="title">
                                    <a href="/question/view/fppybtvargjbmz6x">
                                        [多选题目]
                                        人工大棚玫瑰花哪个季节盛放花开？？
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="right">
                                        <span>正确率 38%</span>
                                        |
                                        <span>评论 0</span>
                                        |
                                        <span>点击 149</span>
                                    </div>
                                        <a href="/question/list/1" target="_blank">Java工程师</a>
                                        <a href="/question/list/10" target="_blank">C/C++</a>
                                    </div>
                            </div>
                                <div class="item">
                                    <div class="title">
                                        <a href="/question/view/nbtp4h9pqlvukrjj">
                                            [单选题]
                                            杜鹃花一般在哪个季节盛放花开？？
                                        </a>
                                </div>
                                <div class="tags">
                                    <div class="right">
                                        <span>正确率 82%</span>
                                        |
                                        <span>评论 1</span>
                                        |
                                        <span>点击 208</span>
                                    </div>
                                        <a href="/question/list/1" target="_blank">Java工程师</a>
                                        <a href="/question/list/10" target="_blank">C/C++</a>
                                        <a href="/question/list/52" target="_blank">软件工程</a>
                                        <a href="/question/list/73" target="_blank">网络基础</a>
                                        <a href="/question/list/83" target="_blank">数组</a>
                                        <a href="/question/list/93" target="_blank">阿里巴巴</a>
                                    </div>
                            </div>
                                <div class="item">
                                <div class="title">
                                    <a href="/question/view/edt2dqstbhmqbv68">
                                        [单选题]
                                        水泥剂量应等于()。
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="right">
                                        <span>正确率 30%</span>
                                        |
                                        <span>评论 2</span>
                                        |
                                        <span>点击 1866</span>
                                    </div>
                                </div>
                            </div>
                                <div class="item">
                                <div class="title">
                                    <a href="/question/view/e70pxezbuk9t4kdb">
                                        [问答题]
                                        题目描述
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="right">
                                        <span>正确率 -</span>
                                        |
                                        <span>评论 1</span>
                                        |
                                        <span>点击 605</span>
                                    </div>
                                </div>
                            </div>
                                <div class="item">
                                <div class="title">
                                    <a href="/question/view/zrpfq860uols1xqf">
                                        [填空题]
                                        题目描述（ ）描述（ ）
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="right">
                                        <span>正确率 -</span>
                                        |
                                        <span>评论 2</span>
                                        |
                                        <span>点击 537</span>
                                    </div>
                                </div>
                            </div>
                                <div class="item">
                                <div class="title">
                                    <a href="/question/view/q1qphf6sga8m4tfw">
                                        [判断题]
                                        题目描述
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="right">
                                        <span>正确率 0%</span>
                                        |
                                        <span>评论 0</span>
                                        |
                                        <span>点击 332</span>
                                    </div>
                                </div>
                            </div>
                                <div class="item">
                                <div class="title">
                                    <a href="/question/view/h8y7wuza7gsdvc3x">
                                        [单选题]
                                        水泥剂量应等于()。
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="right">
                                        <span>正确率 22%</span>
                                        |
                                        <span>评论 0</span>
                                        |
                                        <span>点击 385</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="title">
                                    <a href="/question/view/672015mwcfwhpami">
                                        [单选题]
                                        题目描述
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="right">
                                        <span>正确率 31%</span>
                                        |
                                        <span>评论 0</span>
                                        |
                                        <span>点击 341</span>
                                    </div>
                                </div>
                            </div>
                                <div class="item">
                                <div class="title">
                                    <a href="/question/view/vwltxi50twymgbwr">
                                        [问答题]
                                        题目描述
                                    </a>
                                </div>
                                <div class="tags">
                                    <div class="right">
                                        <span>正确率 -</span>
                                        |
                                        <span>评论 1</span>
                                        |
                                        <span>点击 233</span>
                                    </div>
                                </div>
                            </div>
                            <a class="more" href="/question/list">查看更多 <i class="uk-icon-angle-double-down"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="main-container">
            <div class="articles">
                <a href="/article/1">关于我们</a>
                <a href="/article/2">联系我们</a>
            </div>
            <div class="copyright">
                <a href="http://www.miitbeian.gov.cn" target="_blank">沪ICP备09061954号-8</a>
                &copy;
                demo-tiku.tecmz.com
            </div>
        </div>
    </footer>
    <script src="http://tecmz-demo-tiku.c.ecuster.com/assets/main/default/home.js?1015598456"></script>
@endsection