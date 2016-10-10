/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 5.6.17 : Database - school
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`school` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `school`;

/*Table structure for table `sch_admin` */

DROP TABLE IF EXISTS `sch_admin`;

CREATE TABLE `sch_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL COMMENT '用户名',
  `account` varchar(50) NOT NULL COMMENT '登录账号',
  `psw` varchar(100) NOT NULL COMMENT '登录密码，使用md5加密',
  `teacher_id` int(11) NOT NULL DEFAULT '0' COMMENT '资料ID，跟相应的资料ID绑定，目前主要对于教师',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '账号是否有效，1为有效，0为无效',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最近登录的时间',
  `ip` varchar(50) NOT NULL COMMENT '最近登录的IP地址',
  `auth` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1为教师权限，2为超级管理员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sch_admin` */

insert  into `sch_admin`(`id`,`user_name`,`account`,`psw`,`teacher_id`,`flag`,`create_time`,`login_time`,`ip`,`auth`) values (1,'lnc','lnc','e10adc3949ba59abbe56e057f20f883e',1,1,'2016-09-22 21:30:04','2016-09-22 21:30:16','127.0.0.1',1);

/*Table structure for table `sch_per_teacher` */

DROP TABLE IF EXISTS `sch_per_teacher`;

CREATE TABLE `sch_per_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL DEFAULT '0' COMMENT '教师ID',
  `check_id` int(11) NOT NULL DEFAULT '0' COMMENT '审核人ID',
  `answer` tinyint(4) NOT NULL DEFAULT '0' COMMENT '答案，1为是，0 为否',
  `explain` varchar(500) NOT NULL DEFAULT '' COMMENT '说明',
  `get_point` int(11) NOT NULL DEFAULT '0' COMMENT '该题的得分',
  `year` int(11) NOT NULL COMMENT '年份，如2016',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '填写时间',
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sch_per_teacher` */

/*Table structure for table `sch_point` */

DROP TABLE IF EXISTS `sch_point`;

CREATE TABLE `sch_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workload` tinyint(4) NOT NULL DEFAULT '0' COMMENT '基本工作量(积点数 100)。语文、数学、英语10节/周；物理、化学、生物、政治、历史、地理12节/周；体育、艺术、通用技术、信息技术、心理健康14节/周。高三高考科目10节/周，高三高考综合科目两个班为满工作量。',
  `section_leader` tinyint(4) NOT NULL DEFAULT '0' COMMENT '科组长为1，备课组长为2，不是为0。积点数：科组长45、备课组长30',
  `director` tinyint(4) NOT NULL DEFAULT '0' COMMENT '主任、副主任、部门干事 、年级长、副级长、班主任。积点45。1为是',
  `officer` tinyint(4) NOT NULL DEFAULT '0' COMMENT '部门干事，积点为40。1是',
  `school_leader` tinyint(4) NOT NULL DEFAULT '0' COMMENT '校级领导，积点为60。1是',
  `part_time_magazine` tinyint(4) NOT NULL DEFAULT '0' COMMENT '兼职校刊、校报编辑工作、青蓝工程指导教师,积点为12。1是',
  `part_time_magazine_data` varchar(500) NOT NULL DEFAULT '' COMMENT '需要上传工作量记录表和指导记录。如果part_time_magazine为1',
  `academic` tinyint(4) NOT NULL DEFAULT '0' COMMENT '学术委员、学堂干事,积点15。1为是。',
  `education_case` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1为在研的校级课题主持人，2在研的校级课题成员排序前三位，3为 在研的校级课题其他成员，4为在研的市级及市级以上课题主持人，5为在研的市级及市级以上课题成员排序前三位，6为在研的市级及市级以上课题其他成员。为在研的校级课题：主持人7，成员排序前三位4，其他成员2；在研的市级及市级以上课题：主持人11，成员排序前三位6，其他成员3。',
  `paper` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1为校级，2为市级，3为省级，4为国家级。每年提交一项最高级别的发表论文：校级5点、市级10点、省级15点、国家级20点。',
  `counselor` tinyint(4) NOT NULL DEFAULT '0' COMMENT '心理咨询师。1是，积点为5',
  `substitute` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是不是有代课，1为有。',
  `substitute_num` int(5) NOT NULL DEFAULT '0' COMMENT '代课的节数，1节课0.5个积点',
  `satisfaction_survey` tinyint(4) NOT NULL DEFAULT '0' COMMENT '每学年进行2次满意度调查，每次满意度达80%以上，可获得5个积点奖励。1达到条件',
  `attendance_award` int(11) NOT NULL DEFAULT '0' COMMENT '缺席次数，每缺席一次扣除1点积点，如果不填写则为全勤。要提供考勤记录。总的积点20点',
  `attendance_award_data` varchar(500) NOT NULL DEFAULT '' COMMENT '考勤记录',
  `school_teacher` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是不是别聘为高三、初三老师、多语种班项目，1为聘用。积点30个',
  `finish_goal` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否完成高考（中考）预定指标，奖励积点5个',
  `college_num` int(11) NOT NULL DEFAULT '0' COMMENT '本科生超出指标数量，一个增加6个积点',
  `middle_num` int(11) NOT NULL DEFAULT '0' COMMENT '重点高中生超出指标数量，一个增加10个积点',
  `super_workload` int(11) NOT NULL DEFAULT '0' COMMENT '超出工作量的上课节数，每节课增加0.5个积点',
  `school_class` int(11) NOT NULL DEFAULT '0' COMMENT '校级公开课实验课，每节课增加5个积点',
  `city_class` int(11) NOT NULL DEFAULT '0' COMMENT '市级公开课实验课，每节课增加10个积点',
  `courses` int(11) NOT NULL DEFAULT '0' COMMENT '八大学堂精品课程，获得精品课程的次数，每学年最多2次，每次可以增加3个积点',
  `country_match` int(11) NOT NULL DEFAULT '0' COMMENT '中学生奥林匹克竞赛、学科竞赛、外语竞赛、综合、通用类比赛。学生进入国家集训队的个数，每个人增加5个积点',
  `province_match` int(11) NOT NULL DEFAULT '0' COMMENT '中学生奥林匹克竞赛、学科竞赛、外语竞赛、综合、通用类比赛。学生进入省级的个数，每个人增加3个积点',
  `city_match` int(11) NOT NULL DEFAULT '0' COMMENT '中学生奥林匹克竞赛、学科竞赛、外语竞赛、综合、通用类比赛。学生进入市级的个数，每个人增加1个积点',
  `exam_pro` tinyint(4) NOT NULL DEFAULT '0' COMMENT '学段考的试卷是否优秀试卷。1为一等试卷，2为二等试卷，3为三等试卷。，一等试卷可获得3个积点，二等试卷2个积点，三等试卷1个积点',
  `exam_rank` tinyint(4) NOT NULL DEFAULT '0' COMMENT '以教务处学段考考试简报为依据，学段考试成绩综合排名（参考B值，均分）在同备课组内位列前50%的，奖励科任老师6个积点。1为是。',
  `exam_rank_data` varchar(500) NOT NULL DEFAULT '' COMMENT '教务处学段考考试简报',
  `outstand_sub` tinyint(4) NOT NULL DEFAULT '0' COMMENT '以市教科院文件为准，市级以上科组成员人均获得2个积点。科组长另奖励5个积点。1为市级组成员，2为科组长。',
  `outstand_sub_data` varchar(500) NOT NULL DEFAULT '' COMMENT '市教科院文件',
  `select_outstand_school` tinyint(4) NOT NULL DEFAULT '0' COMMENT '校级优秀（含优秀班主任或工作人员或优秀课题组主持人或课题组科研骨干）。1为校级优秀，2为市级优秀,3为省级优秀，4为国家优秀。校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点',
  `select_outstand_year` tinyint(4) NOT NULL DEFAULT '0' COMMENT '考核优秀，1为校级优秀，2为市级优秀,3为省级优秀，4为国家优秀。校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点',
  `select_outstand_person` tinyint(4) NOT NULL DEFAULT '0' COMMENT '教育系统表彰高考工作先进个人（学科先进个人）1为校级优秀，2为市级优秀,3为省级优秀，4为国家优秀。校级加5个积点，市级加10个积点，省级增加15个积点，国家增加20个积点',
  `expert` tinyint(4) NOT NULL DEFAULT '0' COMMENT '教育科研专家工作室主持人、名师工作室主持人、名班主任、骨干教师、教坛新秀等市级奖励10个积点，省级奖励15个积点。特级教师奖励20个积点。1为市级，2为省级，3为特级教师',
  `work_year` date NOT NULL DEFAULT '0000-00-00' COMMENT '自竞聘人员参加工作之月计起（以人事档案的第一份履历表为准），每月0.4分。研究生工龄从上研究生之日进行计算。开始工作的日期。',
  `work_year_month` int(11) NOT NULL DEFAULT '0' COMMENT '工龄的月份数',
  `city_year` date NOT NULL DEFAULT '0000-00-00' COMMENT '自竞聘人员正式调入我市工作当月计起（以到主管部门报到时间为准），每月0.6分。校龄分每日加0.2分。精确到日期',
  `city_year_month` int(11) NOT NULL DEFAULT '0' COMMENT '市龄月份数',
  `school_work_days` int(11) NOT NULL DEFAULT '0' COMMENT '校龄天数',
  `job_title` date NOT NULL DEFAULT '0000-00-00' COMMENT '自取得拟竞聘的专业技术职称资格时间计起（以证书为准），每月0.8分。日期',
  `job_title_month` int(11) NOT NULL DEFAULT '0' COMMENT '职称的月份数',
  `postgraduate` tinyint(4) NOT NULL DEFAULT '0' COMMENT '获得全日制研究生学历和硕士学位者加9分；获得全日制研究生学历和博士学位者加15分。有研究生学位者视为研究生对待。1为研究生，2为博士生',
  `eight_teacher` tinyint(4) NOT NULL DEFAULT '0' COMMENT '八大学堂选修课主讲教师,1为是。5个积点',
  `league_teacher` tinyint(4) NOT NULL DEFAULT '0' COMMENT '社团指导老师,1为是。5个积点',
  `tutor` tinyint(4) NOT NULL DEFAULT '0' COMMENT '导师制导师，1为是。5个积点',
  `union` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是不是工会成员，1为工会委员，2为工会组长。工会委员增加5个积点，工会组长增加9个积点。',
  `join_festival` tinyint(4) NOT NULL DEFAULT '0' COMMENT '参与学校重大节日的专业教师加4分,1为参加。',
  `teacher_id` int(11) NOT NULL DEFAULT '0' COMMENT '教师ID',
  `year` int(11) DEFAULT '0' COMMENT '年，存2016',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '录入时间',
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  `total_point` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '该年度总共的积点分数',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '该年度该条积点的状态，1为待审核，2为教务处审核中，3办公室审核中，4评审委员会审核中，5校长是否公布，6已完成',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `sch_point` */

/*Table structure for table `sch_point_options` */

DROP TABLE IF EXISTS `sch_point_options`;

CREATE TABLE `sch_point_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option_content` varchar(500) NOT NULL COMMENT '积点考核的内容',
  `point` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '积点的分数',
  `category` tinyint(4) NOT NULL DEFAULT '1' COMMENT '类别，1为基本岗位积点，2兼职性积点，3奖励性积点，4个人资料积点',
  `remark` varchar(500) NOT NULL DEFAULT '' COMMENT '备注',
  `flag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '该选项是否有效，1为有效，0为无效',
  `create_time` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` timestamp NULL DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sch_point_options` */

/*Table structure for table `sch_point_teacher` */

DROP TABLE IF EXISTS `sch_point_teacher`;

CREATE TABLE `sch_point_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL DEFAULT '0' COMMENT '教师ID',
  `base_point` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '基本岗位积点数',
  `part_time_point` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '兼职岗位积点数',
  `award_point` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '奖励的积点数',
  `person_point` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '个人资历积点数',
  `total_point` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总的分数',
  `year` int(11) NOT NULL DEFAULT '0' COMMENT '录入的年份',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '1' COMMENT '该年度该条积点的状态，1为待审核，2为教务处审核中，3办公室审核中，4评审委员会审核中，5校长是否公布，6已完成',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `sch_point_teacher` */

insert  into `sch_point_teacher`(`id`,`teacher_id`,`base_point`,`part_time_point`,`award_point`,`person_point`,`total_point`,`year`,`create_time`,`update_time`,`status`) values (1,1,'100.00','186.00','138.00','386.00','810.00',2016,'2016-09-29 01:12:13','2016-09-29 01:12:13',1),(2,1,'100.00','186.00','137.50','386.20','809.70',2016,'2016-09-29 01:14:55','2016-09-29 01:14:55',1);

/*Table structure for table `sch_teacher` */

DROP TABLE IF EXISTS `sch_teacher`;

CREATE TABLE `sch_teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '教师ID',
  `mobile` varchar(50) NOT NULL DEFAULT '0' COMMENT '教师联系方式',
  `name` varchar(50) NOT NULL COMMENT '教师名称',
  `subject` tinyint(4) NOT NULL DEFAULT '0' COMMENT '所教学科，1为语文，2为数学，3为英语，4为计算机，5为音乐（后面扩展），0为没有学科',
  `address` varchar(100) NOT NULL DEFAULT '' COMMENT '教师居住地',
  `department` tinyint(4) NOT NULL DEFAULT '0' COMMENT '所属部门，1为教师队伍，没有所属部门，2为教务处成员，3办公室成员，4为评审委员会成员,5为校长',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是不是部门负责人，1为负责人（主任等），0为普通职员',
  `point` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '现阶段的积点',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后修改的时间',
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sch_teacher` */

insert  into `sch_teacher`(`teacher_id`,`mobile`,`name`,`subject`,`address`,`department`,`is_admin`,`point`,`create_time`,`update_time`) values (1,'15899872592','李农成',2,'深圳市南山区金融科技大厦',1,0,'0.00','2016-09-22 21:31:02','2016-09-25 16:03:26');

/*Table structure for table `sch_teaching_performance` */

DROP TABLE IF EXISTS `sch_teaching_performance`;

CREATE TABLE `sch_teaching_performance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(500) NOT NULL DEFAULT '' COMMENT '绩效考核的题目',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1．教学绩效类,2．专业发展类,3教育与管理类',
  `point` int(11) NOT NULL DEFAULT '0' COMMENT '题目分值',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `sch_teaching_performance` */

insert  into `sch_teaching_performance`(`id`,`topic`,`type`,`point`,`create_time`,`update_time`) values (1,'以学期为单位，聘任期内每一阶段都承担满量教学任务',1,10,'2016-09-22 17:33:16','2016-09-22 17:33:16'),(2,'教学效果良好（段考教学质量评估、排名、进步率参照B值、均分、学科竞赛、高考等等）',1,10,'2016-09-22 17:33:28','2016-09-22 17:33:28'),(3,'教学行为规范，无违反学校教学常规要求行为（即教学事故，如无故缺课或缺监考、上课或监考迟到、打骂学生、课堂秩序混乱、试题泄露、不执行或未完成教学计划、有偿家教等等）',1,10,'2016-09-22 17:33:41','2016-09-22 17:33:41'),(4,'积极承担学校八大学堂、校本选修课、社会实践课等课程的开发与实施，教学效果好，学生满意度80%以上',1,10,'2016-09-22 17:33:58','2016-09-22 17:33:58'),(5,'积极参与各项科组建设活动（科组、备课组例会参会情况、示范课、课改课、研究课、竞赛课、特色科组创建等等）',1,10,'2016-09-22 17:34:14','2016-09-22 17:34:14'),(6,'主持或参与课题或项目研究并取得相应的研究成果。',2,2,'2016-09-22 17:35:50','2016-09-22 17:35:50'),(7,'组织或参与学校课改、科研项目并取得相应的成果。',2,2,'2016-09-22 17:36:00','2016-09-22 17:36:00'),(8,'在校内外各类教育教学论坛、会议、培训会上做过的学术讲座或报告、发表过文章。',2,2,'2016-09-22 17:36:12','2016-09-22 17:39:42'),(9,'参加国家、省、市各级骨干教师培训并学有所成，是否市级以上骨干教师',2,2,'2016-09-22 17:36:22','2016-09-22 17:43:43'),(10,'参与学校的青年教师培养计划并高质量完成任务，是否师徒结对、是否带实习生。',2,1,'2016-09-22 17:36:31','2016-09-22 17:36:31'),(11,'其他专业发展成果，是否出版发行个人专著。',2,1,'2016-09-22 17:36:45','2016-09-22 17:36:45'),(12,'以学期为单位，每一阶段都承担教育教学管理类工作',3,5,'2016-09-22 17:44:10','2016-09-22 17:44:10'),(13,'班主任工作教育效果良好，按时保质保量完成各项常规管理工作，获学期“文明班级”综合荣誉',3,5,'2016-09-22 17:44:20','2016-09-22 17:44:20'),(14,'注重班主任专业发展，积极参与各级各类名班主任培训活动，及时上交班主任计划、总结、学习心得、经验总结等。',3,4,'2016-09-22 17:44:34','2016-09-22 17:44:34'),(15,'积极承担学校各类德育、活动课程的开发与实施（主持或协助开展班主任沙龙、专业发展论坛，主动进行班会课展示或经验介绍，指导各类学生社团和学生活动、打造优秀社团或优质学生活动等）',3,3,'2016-09-22 17:44:54','2016-09-22 17:44:54'),(16,'获得各级各类德育奖项（优秀班主任、优秀教育工作者及发表德育文章或出版德育专著等）。省级5分，市级3分，校级2分',3,5,'2016-09-22 17:45:11','2016-09-22 17:45:11'),(17,'积极参与学校艺术节、体育节、外语节、社团节等各类大型活动的组织、管理与服务工作，在活动中承担某个项目的具体工作。',3,3,'2016-09-22 17:45:29','2016-09-22 17:45:29'),(18,'以主人翁意识参与学校工作，传播正能量，为完善学校各项工作，主动以书面形式向学校及各部门提出建设性意见并被部门采纳的',3,5,'2016-09-22 17:45:40','2016-09-22 17:45:40'),(19,'因工作需要，服从学校安排，从事其他教育管理岗位且工作突出，或配合学校各部门及时处理各种突发危机事件，关键时刻能顶岗',3,5,'2016-09-22 17:45:51','2016-09-22 17:45:51'),(20,'善于进行教育管理实践及科研，在班级管理、课堂教学等方面有扎实、创新、成熟、有效的做法且被全年级或全校推广开展',3,5,'2016-09-22 17:46:01','2016-09-22 17:46:01');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
