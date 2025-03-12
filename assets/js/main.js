document.addEventListener("DOMContentLoaded", () => {
  // 定義
  const drawerIcon = document.querySelector('.p-drawer__icon');
  const drawerClose = document.querySelector('.p-drawer__close');
  const drawer = document.querySelector('.p-drawer');
  const drawerNavItem = document.querySelectorAll('.p-drawer__body a[href^="#"]');
  const headerHeight = document.querySelector('.p-header').offsetHeight;
  const breakpoint = 768;
  let isMenuOpen = false;
  let isMenuOpenAtBreakpoint = false;
  const mainContent = document.querySelector('main'); // メインコンテンツなど、背景の要素
  const footerContent = document.querySelector('footer');
  const headerContent = document.querySelector('header');
  const iconX = document.querySelector('.p-cta');

  const focusableElements = [mainContent, footerContent, headerContent, iconX];

  // メニューを開く
  const openMenu = () => {
    if (!drawer.classList.contains("js-show")) {
      drawer.classList.add("js-show");
      isMenuOpen = true; // メニューが開いたことを示す

      // 100ms遅延させて `inert` を適用
      setTimeout(() => {
        focusableElements.forEach(element => {
          element.setAttribute('inert', '');
          element.setAttribute('tabindex', '-1'); // キーボードフォーカスを防ぐ
        });
      }, 100);
    }
  };

  // メニューを閉じる
  const closeMenu = () => {
    if (drawer.classList.contains("js-show")) {
      drawer.classList.remove("js-show");
      isMenuOpen = false; // メニューが閉じたことを示す

      // 400ms（アニメーション完了後）に `inert` を解除
      setTimeout(() => {
        focusableElements.forEach(element => {
          element.removeAttribute('inert');
          element.removeAttribute('tabindex');
        });
      }, 400);
    }
  };

  // メニュー外クリックで閉じる処理
  const clickOuter = (event) => {
    if (isMenuOpen && !drawer.contains(event.target) && !drawerIcon.contains(event.target)) {
      closeMenu();
    }
  };

  // リサイズ処理
  const handleResize = () => {
    const windowWidth = window.innerWidth;
    if (windowWidth > breakpoint && isMenuOpenAtBreakpoint) {
      closeMenu();
    } else if (windowWidth <= breakpoint && drawer.classList.contains("js-show")) {
      isMenuOpenAtBreakpoint = true;
    }
  };

  // 該当箇所までスクロール
  const linkScroll = (target) => {
    if (target) {
      const targetPosition = target.getBoundingClientRect().top + window.scrollY;
      const offsetPosition = targetPosition - headerHeight;
      window.scrollTo({
        top: offsetPosition,
        behavior: "smooth"
      });
    }
  };

  // ヘッダーアイコン クリック時
  drawerIcon.addEventListener("click", openMenu);
  drawerClose.addEventListener("click", closeMenu);
  // 画面幅リサイズ時
  window.addEventListener("resize", handleResize);
  // メニュー外クリック時
  document.addEventListener("click", clickOuter);
  // ページ内リンクナビメニュー クリック時
  drawerNavItem.forEach(item => {
    item.addEventListener("click", event => {
      event.preventDefault();
      closeMenu();
      const targetItem = document.querySelector(item.getAttribute("href"));
      linkScroll(targetItem);
    });
  });
});


// fvSwiper
const fvSwiper = new Swiper('#js-fv-swiper', {
  // Optional parameters
  loop: true,
  effect: "fade",
  fadeEffect: {
    crossFade: true
  },
  speed: 2000,
  autoplay: {
    delay: 4000,
},
});

// worksSwiper
const worksSwiper = new Swiper('#js-works-swiper', {
  // Optional parameters
  spaceBetween: 7,
  slidesPerView: "auto",
  watchSlidesProgress: true,
  rewind: true,

  // If we need pagination
  pagination: {
    el: '.p-works-swiper__pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.p-works-swiper__next',
    prevEl: '.p-works-swiper__prev',
  },
});

// ヘッダーの高さを考慮したリンクのスムーススクロール
document.addEventListener("DOMContentLoaded", function () {
  const links = document.querySelectorAll('a[href^="#"], a[href*="#"]');

  function scrollToTarget(targetId) {
    if (!targetId || targetId === "#") return;

    const target = document.querySelector(targetId);
    if (target) {
      const header = document.querySelector(".p-header__wrapper");
      const headerOffset = header ? header.offsetHeight : 0;
      const elementPosition = target.getBoundingClientRect().top + window.scrollY;
      const offsetPosition = elementPosition - headerOffset;

      window.scrollTo({
        top: offsetPosition,
        behavior: "smooth",
      });
    }
  }

  // クリックイベント
  links.forEach((item) => {
    item.addEventListener("click", (event) => {
      const href = item.getAttribute("href");

      // 別ページへのリンクの場合は処理をスキップ
      if (href.startsWith("http") && !href.includes(window.location.hostname)) return;

      // 同じページ内のアンカーリンクなら処理
      if (href.startsWith("#")) {
        event.preventDefault();
        scrollToTarget(href);
      }
    });
  });

  // **ページ遷移後の処理（ヘッダーの高さを考慮）**
  if (window.location.hash) {
    setTimeout(() => {
      scrollToTarget(window.location.hash);
    }, 0); // ページの読み込み後に少し遅らせてスクロール
  }
});

document.addEventListener('wpcf7invalid', function(event) {
  setTimeout(function() {
    // wpcf7-form-control-wrap をすべて取得
    document.querySelectorAll('.wpcf7-form-control-wrap').forEach(function(el) {
      // 該当するエラーメッセージ（wpcf7-not-valid-tip）があるか確認
      let errorTip = el.querySelector('.wpcf7-not-valid-tip');
      if (errorTip) {
        // フォームフィールドの上にエラーメッセージを移動
        el.parentNode.insertBefore(errorTip, el);
      }
    });
  }, 10); // 非同期のため少し遅延させる
});


document.addEventListener('DOMContentLoaded', function() {
  document.addEventListener('submit', function(event) {
    let form = event.target.closest('.wpcf7-form');
    if (!form) return;

    // 既存のエラーメッセージをクリア
    form.querySelectorAll('.wpcf7-not-valid-tip, .custom-error').forEach(el => el.remove());

    let isValid = true;

    // お名前フィールドのバリデーション
    let nameField = form.querySelector('input[name="your-name"]');
    if (nameField && nameField.value.trim() === '') {
      showError(nameField, '※入力してください');
      isValid = false;
    } else {
      clearError(nameField);
    }

    // ラジオボタンのバリデーション（2つある場合）
    let radioGroups = form.querySelectorAll('.p-contact__data-radio'); // ラジオボタンを囲む要素（複数）
    let isAnyRadioChecked = false;

    radioGroups.forEach(group => {
      let radioButtons = group.querySelectorAll('input[type="radio"]');
      let isChecked = Array.from(radioButtons).some(radio => radio.checked);

      if (isChecked) {
        isAnyRadioChecked = true;
        clearError(group);
        group.querySelectorAll('.wpcf7-list-item-label').forEach(label => {
          label.classList.remove('is-error');
        });
      } else {
        showError(group, '※選択してください');
        group.querySelectorAll('.wpcf7-list-item-label').forEach(label => {
          label.classList.add('is-error');
        });
        isValid = false;
      }
    });

    if (isAnyRadioChecked) {
      form.querySelectorAll('.p-contact__data-radio .custom-error').forEach(el => el.remove());
    }

    // プライバシーチェックボックスのバリデーション
    let acceptanceGroup = form.querySelector('.p-contact__acceptance'); 
    let privacyCheckbox = form.querySelector('input[name="your-acceptance"]');
    if (!privacyCheckbox.checked) {
      showError(acceptanceGroup, '※同意が必要です');
      acceptanceGroup.querySelectorAll('.wpcf7-list-item-label').forEach(label => {
        label.classList.add('is-error');
      });
      isValid = false;
    } else {
      clearError(acceptanceGroup);
      acceptanceGroup.querySelectorAll('.wpcf7-list-item-label').forEach(label => {
        label.classList.remove('is-error');
      });
    }

    // メールアドレスのバリデーション
    let emailField = form.querySelector('input[name="your-email"]');
    if (emailField && !emailField.value.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
      showError(emailField, '※有効なメールアドレスを入力してください');
      isValid = false;
    } else {
      clearError(emailField);
    }

    // メッセージフィールドのバリデーション
    let messageField = form.querySelector('textarea[name="your-message"]');
    if (messageField && messageField.value.trim() === '') {
      showError(messageField, '※入力してください');
      isValid = false;
    } else {
      clearError(messageField);
    }

    // バリデーションエラーがあれば送信を停止
    if (!isValid) {
      event.preventDefault();
      return false;
    }
  });

  function showError(field, message) {
    let row = field.closest('.p-contact__row');
    let existingError = row?.querySelector('.custom-error');

    if (existingError) {
      existingError.textContent = message;
    } else {
      let error = document.createElement('p');
      error.className = 'custom-error';
      error.style.color = '#E95858';
      error.style.fontSize = '16px';
      error.textContent = message;

      let head = row?.querySelector('.p-contact__head');
      let data = row?.querySelector('.p-contact__data');

      if ((field.type === 'email' || field.tagName.toLowerCase() === 'textarea') && row && data) {
        if (window.innerWidth >= 768) {
          head?.appendChild(error);
        } else {
          row.insertBefore(error, data);
        }
      } else {
        head?.appendChild(error);
      }
      field.classList.add('p-contact__input-error');
    }
  }

  function clearError(field) {
    let row = field.closest('.p-contact__row');
    if (row) {
      let existingError = row.querySelector('.custom-error');
      if (existingError) {
        existingError.remove();
      }
    }
    field.classList.remove('p-contact__input-error');
  }
});

  // アニメーション
window.addEventListener("load", function () {

  gsap.registerPlugin(ScrollTrigger);
  
  const timeDelay = 350; // 時間差のタイミング(ミリ秒)
  const maxItemNumber = 3; // 時間差で発火させる最大要素数
  
  function fadeInFunction(items, timeout) {
    items.forEach((item) => {
      ScrollTrigger.create({
        trigger: item,
        start: "top 85%",
        toggleActions: "play reverse play reverse",
        onEnter: () => {
          setTimeout(() => {
            item.classList.add("js-show");
          }, timeout);
        },
      });
    });
  }

  for (let i = 0; i < maxItemNumber; i++) {
    const fadeInItems = document.querySelectorAll(`.c-animated__fadeIn.--delay${i}`);
    fadeInFunction(fadeInItems, i * timeDelay);
  }

  for (let i = 0; i < maxItemNumber; i++) {
    const blurItems = document.querySelectorAll(`.c-animated__scroll-blur.--delay${i}`);
    fadeInFunction(blurItems, i * timeDelay);
  }
  
  function fadeInFunction(blurItems, timeout) {
    blurItems.forEach((item) => {
      ScrollTrigger.create({
        trigger: item,
        start: "top 70%",
        onEnter: () => {
          setTimeout(() => {
            item.classList.add("js-show");
          }, timeout);
        },
      });
    });
  }

  const fadeInItems = document.querySelectorAll('.c-animated__clipView');
	
	fadeInItems.forEach(item => {
	  ScrollTrigger.create({
	    trigger: item,
	    start: "top 70%",
	    onEnter: () => {
	      item.classList.add("js-show");
	    }
	  });
	});

  const slideInRight = document.querySelectorAll('.c-animated__slideInRight');
	
	slideInRight.forEach(item => {
	  ScrollTrigger.create({
	    trigger: item,
	    start: "top 70%",
	    onEnter: () => {
	      item.classList.add("js-show");
	    }
	  });
	});

  const sheep1 = document.querySelector('.sheep1');

  // タイムラインを作成
  const tl = gsap.timeline({repeat: -1});

function animateSheep1() {
  
}
tl.to(sheep1, {
    duration: 18,
    x: "18vw",
    y: 30,
    ease: "linear"
});

tl.to(sheep1, {
    duration: 1,
    rotationY: 180,
});

tl.to(sheep1, {
    duration: 22,
    x: "-10vw",
    y: 20,
});

tl.to(sheep1, {
  duration: 0.3,
  rotationY: 0,
});
tl.to(sheep1, {
  duration: 8,
  x: 0,
  y: 0,
});

gsap.to(sheep1, {
    duration: 0.5,
    rotation: "8deg",
    repeat: -1, // 永久ループ
    yoyo: true, // 往復する
    ease: "sine.inOut" // 滑らかに揺れる
});


  // 永遠に羊が跳ねるアニメーション
  const sheep2 = document.querySelector('.sheep2');

  function randomJump() {
    let jumpHeight = gsap.utils.random(10, 50);
    let pauseTime = gsap.utils.random(0.5, 2); // ランダムな休憩時間

    const tl = gsap.timeline();

    tl.to(sheep2, {
        duration: 0.8,
        rotation: "10deg",
        yoyo: true,
        repeat: 3,
        ease: "sine.inOut"
    });

    tl.to(sheep2, {
        y: -jumpHeight,
        rotation: "10deg",
        duration: 0.6,
        ease: "power1.out"
    });

    tl.to(sheep2, {
        y: 0,
        rotation: "0",
        duration: 1,
        ease: "power1.in"
    });

    tl.call(() => {
        setTimeout(randomJump, pauseTime * 1000);
    });
}

const sheep3 = document.querySelector('.sheep3');

function forwardWavyJump() {

  // タイムラインを作成（無限ループ）
  const tl = gsap.timeline({ repeat: -1 });

  gsap.to(sheep3, {
      duration: 0.5,
      rotation: "6deg",
      yoyo: true,
      repeat: -1,
      ease: "sine.inOut"
  });

  tl.to(sheep3, {
      x: "-20vw",
      y: -20,
      duration: 18,
      ease: "linear"
  });

  tl.to(sheep3, {
      rotationY: 180,
      duration: 0.3,
  });

  tl.to(sheep3, {
      x: "-15vw",
      y: 20,
      duration: 10,
  });

  tl.to(sheep3, {
      x: 0,
      y: 0,
      duration: 16,
      ease: "power1.out"
  });
}

    animateSheep1();
    randomJump();
    forwardWavyJump();

});

const isFirstVisit = sessionStorage.getItem('firstVisit');
const loadingScreen = document.querySelector('#loading');
const loadingEndTime = 2000;
const animatedBlurElement = document.querySelector(".c-animated__blur");
const fadeInText = document.querySelectorAll(".c-animated__text");

function startMvAnimation() {
  if (animatedBlurElement) {
    animatedBlurElement.classList.add("js-show");
  }

  if (fadeInText.length > 0) {
    fadeInText.forEach((element) => {
      new SplitType(element);

      const chars = element.querySelectorAll(".char");
      gsap.to(chars, {
        opacity: 1,
        stagger: 0.1,
        delay: 1,
      });
      element.style.opacity = "1";
    });
  }
}

document.addEventListener("DOMContentLoaded", function () {
  if (!isFirstVisit) {
    // 初回訪問時の処理
    setTimeout(() => {
      if (loadingScreen) {
        loadingScreen.classList.add('js-loading-end');

        setTimeout(() => {
          loadingScreen.style.display = "none";
          startMvAnimation();
        }, 500); // フェードアウト後に非表示
      }
    }, loadingEndTime);

    sessionStorage.setItem('firstVisit', 'true');
  } else {
    // 再訪問時の処理
    if (loadingScreen) {
      loadingScreen.style.display = "none"; // 初期状態で非表示
    }
    startMvAnimation();
  }
});
